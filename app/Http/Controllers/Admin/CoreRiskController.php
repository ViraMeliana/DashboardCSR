<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreRisk;
use App\Models\Evidance;
use App\Models\EvidanceQuartal;
use App\Models\Mitigation;
use App\Models\Risiko;
use App\Models\User;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SpreadsheetReader;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CoreRiskController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('core_risk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CoreRisk::query()->select(sprintf('%s.*', (new CoreRisk())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'core_risk_show';
                $editGate = 'core_risk_edit_ed';
                $deleteGate = 'core_risk_delete';
                $crudRoutePart = 'core-risks';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('subject', function ($row) {
                return $row->subject ? $row->subject : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }


        return view('admin.coreRisks.index');
    }


    public function processCsvImport(Request $request)
    {
        $file = $request->file('csv_file');

        $request->validate([
            'csv_file' => 'mimes:csv,txt',
        ]);

        $filename = Str::random(10) . '.csv';
        $file->storeAs('csv_import', $filename);

        try {
            $path = storage_path('app/csv_import/' . $filename);

            $reader = new SpreadsheetReader($path);
            $insert = [];

            $afterHeader = false;
            $rowHeader = 0;

            $noIndex = 0;
            $subjectIndex = 0;
            $causeIndex = 0;
            $impactIndex = 0;
            $mitigationIndex = 0;
            $mitigationCatIndex = 0;
            $evidenceIndex = 0;
            $picIndex = 0;

            $currentSubject = null;
            $currentMitigation = null;

            foreach ($reader as $key => $row) {
                if (!$afterHeader) {
                    foreach ($row as $index => $item) {
                        if (Str::slug($item) == 'no') {
                            $noIndex = $index;
                            $afterHeader = true;
                            $rowHeader = $key;
                        } else if (Str::slug($item) == 'nama-risiko-berdasar-p') $subjectIndex = $index;
                        else if (Str::slug($item) == 'sebab-risiko') $causeIndex = $index;
                        else if (Str::slug($item) == 'dampak') $impactIndex = $index;
                        else if (Str::slug($item) == 'proactive-mitigation') $mitigationIndex = $index;
                        else if (Str::slug($item) == 'pro') $mitigationCatIndex = $index;
                        else if (Str::slug($item) == 'eviddence') $evidenceIndex = $index;
                        else if (Str::slug($item) == 'pic') $picIndex = $index;
                    }
                }

                if ($key != $rowHeader && $key != ($rowHeader + 1)) {
                    if ($row[$noIndex] != null && $row[$subjectIndex] != null && $row[$causeIndex] != null) {
                        $currentSubject = $row[$noIndex];

                        $insert[$row[$noIndex]] = [
                            'subject' => $row[$subjectIndex],
                            'cause' => $row[$causeIndex],
                            'impact' => $row[$impactIndex],
                            'mitigation' => [

                            ],
                        ];
                    } else {
                        if ($row[$mitigationIndex] != null) {
                            $currentMitigation = $row[$mitigationIndex];
                            $insert[$currentSubject]['mitigation'][$currentMitigation] = [
                                'category' => $row[$mitigationCatIndex],
                                'users' => $row[$picIndex],
                                'evidence' => [

                                ]
                            ];
                        }

                        if ($row[$evidenceIndex] != null) {
                            $currentEvidence = $row[$evidenceIndex];
                            $insert[$currentSubject]['mitigation'][$currentMitigation]['evidence'][Str::slug($row[$mitigationIndex + 1])] = $currentEvidence;
                        }
                    }
                }

            }

            if (isset($insert)) {
                $coreRisk = CoreRisk::create([
                    'subject' => 'RISK-' . Carbon::now()->format('Y-m-d'),
                    'description' => 'RISK-' . Carbon::now()->format('Y-m-d'),
                    'year' => $request->year ?? Carbon::now()->format('Y-m-d')
                ]);

                if ($coreRisk) {
                    $risikoId = [];

                    foreach ($insert as $item) {
                        $risk = Risiko::create([
                            'subject' => $item['subject'] ?? '',
                            'cause' => $item['cause'] ?? '',
                            'impact' => $item['impact'],
                        ]);

                        if (isset($item['mitigation']) && $risk) {
                            $risikoId[] = $risk->id;

                            $mitigationId = [];
                            foreach ($item['mitigation'] as $idx => $itm) {
                                $mitigation = Mitigation::create([
                                    'subject' => $idx,
                                    'category' => $itm['category'],
                                ]);

                                if ($mitigation) {
                                    $mitigationId[] = $mitigation->id;

                                    if (isset($itm['users'])) {
                                        $parseUser = explode('-', Str::slug($itm['users']));
                                        $userId = [];

                                        foreach ($parseUser as $item) {
                                            $user = User::with('positions')->where('name', $item)->first();
                                            if ($user) {
                                                $userId[] = $user->id;
                                            } else {
                                                $createUser = User::create([
                                                    'name' => $item,
                                                    'email' => $item . '@' . $item . '.com',
                                                    'password' => 'password',
                                                ]);

                                                if ($createUser) {
                                                    $createUser->roles()->sync([2]);
                                                    $userId[] = $createUser->id;
                                                }
                                            }
                                        }

                                        $mitigation->users()->sync($userId);
                                    }

                                    if (isset($itm['evidence'])) {
                                        $evidanceId = [];

                                        foreach ($itm['evidence'] as $in => $it) {
                                            $evidance = Evidance::create([
                                                'mitigation_id' => $mitigation->id,
                                                'code' => $in,
                                                'subject' => $it,
                                            ]);

                                            if ($evidance) {
                                                $evidanceId[] = $evidance->id;
                                            }
                                        }

                                        $mitigation->evidances()->sync($evidanceId);
                                    }
                                }
                            }

                            $risk->mitigations()->sync($mitigationId);
                        }
                    }

                    $coreRisk->risikos()->sync($risikoId);
                }
            }

            return redirect()->route('admin.core-risks.index');
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function create()
    {
        abort_if(Gate::denies('core_risk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function store(StoreCoreRiskRequest $request)
    {
        $coreRisk = CoreRisk::create($request->all());

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function edit(CoreRisk $coreRisk)
    {
        abort_if(Gate::denies('core_risk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function update(UpdateCoreRiskRequest $request, CoreRisk $coreRisk)
    {
        $coreRisk->update($request->all());

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function showQuartal(Request $request) {
        if ($request->has('evidance_id') && $request->ajax()) {
            $quartalEvidence = Evidance::with('quartals')->where('id', $request->evidance_id)->first();

            $quartalEvidanceView = view('partials.quartalShowActions', compact('quartalEvidence'))->render();

            return response()->json([
                'data' => $quartalEvidanceView
            ]);
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function updateQuartal(Request $request) {
        if ($request->has('evidance_id')) {
            $evidance = Evidance::with('quartals')->where('id', $request->evidance_id)->first();

            if ($evidance) {
                $evidanceId = $evidance->quartals->pluck('id');
                $quartalEvidance = EvidanceQuartal::create([
                    'status' => $request->status ?? '',
                    'date' => $request->date ?? '',
                    'quartal' => $request->quartal ?? '',
                ]);

                if ($quartalEvidance) {
                    $evidanceId[] = $quartalEvidance->id;
                    $evidance->quartals()->sync($evidanceId);
                }

            }

            return redirect()->back();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function extractUsers($users): string
    {
        $result = '';
        foreach ($users as $user) {
            $result .= ' '. $user->name;
        }

        return $result;
    }

    public function show(CoreRisk $coreRisk)
    {
        abort_if(Gate::denies('core_risk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coreRisk->load('risikos', 'risikos.mitigations', 'risikos.mitigations.evidances', 'risikos.mitigations.users', 'risikos.mitigations.evidances.quartals');

        $toShow = [];
        $no = 1;

        foreach ($coreRisk->risikos as $item) {
            $sameRisikos = false;

            foreach ($item->mitigations as $mitigation) {
                $sameMitigation = false;

                foreach ($mitigation->evidances as $evidance) {

                    $toShow[$item->subject][] = [
                        'no' => $sameRisikos ? '' : $no,
                        'risiko' => $sameRisikos ? '' : $item->subject,
                        'risiko_cause' => $sameRisikos ? '' : $item->cause,
                        'risiko_impact' => $sameRisikos ? '' : $item->impact,
                        'mitigation_category' => $sameMitigation ? '' :$mitigation->category,
                        'mitigation' => $sameMitigation ? '' :$mitigation->subject,
                        'users' => $sameMitigation ? '' :$this->extractUsers($mitigation->users),
                        'evidance' => $evidance->subject,
                        'evidance_code' => $evidance->code,
                        'evidance_id' => $evidance->id
                    ];

                    $sameMitigation = true;
                    $sameRisikos = true;
                }
            }

            $no++;
        }


        return view('admin.coreRisks.show', compact('coreRisk', 'toShow'));
    }

    public function destroy(CoreRisk $coreRisk)
    {
        abort_if(Gate::denies('core_risk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coreRisk->delete();

        return back();
    }

    public function massDestroy(MassDestroyCoreRiskRequest $request)
    {
        CoreRisk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
