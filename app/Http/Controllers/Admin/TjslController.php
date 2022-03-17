<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTjslRequest;
use App\Http\Requests\StoreTjslRequest;
use App\Http\Requests\UpdateTjslRequest;
use App\Models\Pilar;
use App\Models\Tjsl;
use App\Models\Tpb;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SpreadsheetReader;
use Symfony\Component\HttpFoundation\Response;

class TjslController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('tjsl_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tjsls = Tjsl::with(['tpbs'])->get();

        return view('admin.tjsls.index', compact('tjsls'));
    }

    public function create()
    {
        abort_if(Gate::denies('tjsl_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tpbs = Tpb::pluck('tpb_number', 'id');

        return view('admin.tjsls.create', compact('tpbs'));
    }

    public function store(StoreTjslRequest $request)
    {
        $tjsl = Tjsl::create($request->all());
        $tjsl->tpbs()->sync($request->input('tpbs', []));

        return redirect()->route('admin.tjsls.index');
    }

    public function edit(Tjsl $tjsl)
    {
        abort_if(Gate::denies('tjsl_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tpbs = Tpb::pluck('tpb_number', 'id');

        $tjsl->load('tpbs');

        return view('admin.tjsls.edit', compact('tjsl', 'tpbs'));
    }

    public function update(UpdateTjslRequest $request, Tjsl $tjsl)
    {
        $tjsl->update($request->all());
        $tjsl->tpbs()->sync($request->input('tpbs', []));

        return redirect()->route('admin.tjsls.index');
    }

    public function show(Tjsl $tjsl)
    {
        abort_if(Gate::denies('tjsl_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tjsl->load('tpbs');

        $toShow = [];
        $pilars = Pilar::all();

        foreach ($pilars as $pilar) {
            foreach ($tjsl->tpbs as $item) {
                if ($pilar->id == $item->pilar_id) {
                    $toShow[$pilar->name][] = $item->toArray();

                    isset($toShow[$pilar->name . '-rka']) ? $toShow[$pilar->name . '-rka'] += (int)$item->rka : $toShow[$pilar->name . '-rka'] = (int)$item->rka;
                    isset($toShow[$pilar->name . '-cash-out']) ? $toShow[$pilar->name . '-cash-out'] += (int)$item->cash_out : $toShow[$pilar->name . '-cash-out'] = (int)$item->cash_out;
                    isset($toShow[$pilar->name . '-commited']) ? $toShow[$pilar->name . '-commited'] += (int)$item->commited : $toShow[$pilar->name . '-commited'] = (int)$item->commited;
                    isset($toShow[$pilar->name . '-realization']) ? $toShow[$pilar->name . '-realization'] += (int)$item->realization : $toShow[$pilar->name . '-realization'] = (int)$item->realization;
                }
            }

            isset($toShow['rka-all']) ? $toShow['rka-all'] += $toShow[$pilar->name . '-rka']
                : $toShow['rka-all'] = $toShow[$pilar->name . '-rka'];

            isset($toShow['cash-out-all']) ? $toShow['cash-out-all'] += $toShow[$pilar->name . '-cash-out']
                : $toShow['cash-out-all'] = $toShow[$pilar->name . '-cash-out'];

            isset($toShow['commited-all']) ? $toShow['commited-all'] += $toShow[$pilar->name . '-commited']
                : $toShow['commited-all'] = $toShow[$pilar->name . '-commited'];

            isset($toShow['realization-all']) ? $toShow['realization-all'] += $toShow[$pilar->name . '-realization']
                : $toShow['realization-all'] = $toShow[$pilar->name . '-realization'];
        }

        return view('admin.tjsls.show', compact('toShow'));
    }

    public function showChart(Request $request)
    {
        if ($request->ajax()) {

            $pilar = Pilar::all();

            $result['category'] = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Dec'];

            foreach ($pilar as $c) {
                $per_month = [];

                for ($i = 1; $i <= 12; $i++) {
                    $tjls = Tjsl::with('tpbs')->whereMonth('created_at', $i)
                        ->whereYear('created_at', Carbon::now()->year)->first();


                    if ($tjls) {
                        $to_count = 0;

                        foreach ($tjls->tpbs as $tjl) {
                            if ($tjl->pilar_id == $c->id) {
                                $to_count += $tjl->realization;
                            }
                        }

                        $per_month[] = $to_count;
                    } else {
                        $per_month[] = 0;
                    }
                }

                $result['series'][] = ['name' => $c->name, 'data' => $per_month];
            }

            return json_encode($result);
        }

        return back();
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
            $currentPilar = '';
            $currentPilarId = '';

            $tpbNumberIndex = 0;
            $rkaIndex = 0;
            $commitedIndex = 0;
            $cashOutIndex = 0;
            $realizationIndex = 0;

            foreach ($reader as $key => $row) {
                $tmp = [];

                foreach ($row as $index => $item) {
                    if (Str::slug($item) == 'pilar-pembangunan') $afterHeader = true;

                    // checking column index
                    else if (Str::slug($item) == 'nomor-tpb') $tpbNumberIndex = $index;
                    else if (Str::slug($item) == 'rka') $rkaIndex = $index;
                    else if (Str::slug($item) == 'cash-out') $cashOutIndex = $index;
                    else if (Str::slug($item) == 'commited') $commitedIndex = $index;
                    else if (Str::slug($item) == 'realisasi-total-rp') $realizationIndex = $index;

                    // checking pilars
                    if (Str::slug($item) == 'sosial' && $afterHeader) {
                        $currentPilar = 'sosial';
                        $currentPilarModel = Pilar::where('name', 'sosial')->first();
                        $currentPilarId = $currentPilarModel ? $currentPilarModel->id : '';
                    } else if (Str::slug($item) == 'ekonomi' && $afterHeader) {
                        $currentPilar = 'ekonomi';
                        $currentPilarModel = Pilar::where('name', 'ekonomi')->first();
                        $currentPilarId = $currentPilarModel ? $currentPilarModel->id : '';
                    } else if (Str::slug($item) == 'lingkungan' && $afterHeader) {
                        $currentPilar = 'lingkungan';
                        $currentPilarModel = Pilar::where('name', 'lingkungan')->first();
                        $currentPilarId = $currentPilarModel ? $currentPilarModel->id : '';
                    } else if (Str::slug($item) == 'hukum-tata-kelola' && $afterHeader) {
                        $currentPilar = 'hukum-tata-kelola';
                        $currentPilarModel = Pilar::where('name', 'hukum-tata-kelola')->first();
                        $currentPilarId = $currentPilarModel ? $currentPilarModel->id : '';
                    } else if (Str::slug($item) == 'subtotal-4') {
                        $currentPilar = '';
                        $currentPilarId = '';
                    }
                }

                if ($afterHeader && $currentPilar != '' && $currentPilarId != '' && $row[$tpbNumberIndex] != '') {
                    $tmp = [
                        'tpb_number' => $row[$tpbNumberIndex],
                        'rka' => $this->formatter($row[$rkaIndex]),
                        'cash_out' => $this->formatter($row[$cashOutIndex]),
                        'commited' => $this->formatter($row[$commitedIndex]),
                        'realization' => $this->formatter($row[$realizationIndex]),
                        'pilar_id' => $currentPilarId,
                    ];
                }

                if (count($tmp) > 0) {
                    $insert[] = $tmp;
                }
            }

            $insertedId = [];
            foreach ($insert as $insert_item) {
                $tpb = Tpb::create($insert_item);
                $insertedId[] = $tpb->id;
            }

            $tjsl = Tjsl::create(['periode' => Carbon::now()->format('Y-m-d')]);
            $tjsl->tpbs()->sync($insertedId);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table'));
            return redirect(url()->previous());

        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function formatter($toFormat): string
    {
        return preg_replace('/[^0-9]/', '', $toFormat);
    }

    public function destroy(Tjsl $tjsl)
    {
        abort_if(Gate::denies('tjsl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tjsl->delete();

        return back();
    }

    public function massDestroy(MassDestroyTjslRequest $request)
    {
        Tjsl::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
