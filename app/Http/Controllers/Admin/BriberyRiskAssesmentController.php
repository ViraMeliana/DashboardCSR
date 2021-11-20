<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBriberyRiskAssesmentRequest;
use App\Http\Requests\StoreBriberyRiskAssesmentRequest;
use App\Http\Requests\UpdateBriberyRiskAssesmentRequest;
use App\Models\AtpProcess;
use App\Models\BriberyRiskAssesment;
use App\Models\BusinessPartnerDocument;
use App\Models\Position;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BriberyRiskAssesmentController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('bribery_risk_assesment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BriberyRiskAssesment::with(['atp_process', 'personal_identification', 'business_document'])->select(sprintf('%s.*', (new BriberyRiskAssesment())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'bribery_risk_assesment_show';
                $editGate = 'bribery_risk_assesment_edit';
                $deleteGate = 'bribery_risk_assesment_delete';
                $crudRoutePart = 'bribery-risk-assesments';

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
            $table->addColumn('atp_process_activity', function ($row) {
                return $row->atp_process ? $row->atp_process->activity : '';
            });

            $table->editColumn('requirements', function ($row) {
                return $row->requirements ? $row->requirements : '';
            });
            $table->editColumn('bribery_risk', function ($row) {
                return $row->bribery_risk ? $row->bribery_risk : '';
            });
            $table->editColumn('impact', function ($row) {
                return $row->impact ? $row->impact : '';
            });
            $table->editColumn('risk_causes', function ($row) {
                return $row->risk_causes ? $row->risk_causes : '';
            });
            $table->editColumn('internal_control', function ($row) {
                return $row->internal_control ? $row->internal_control : '';
            });
            $table->editColumn('l', function ($row) {
                return $row->l ? $row->l : '';
            });
            $table->editColumn('c', function ($row) {
                return $row->c ? $row->c : '';
            });
            $table->editColumn('criteria_impact', function ($row) {
                return $row->criteria_impact ? $row->criteria_impact : '';
            });
            $table->editColumn('risk_level', function ($row) {
                return $row->risk_level ? BriberyRiskAssesment::RISK_LEVEL_SELECT[$row->risk_level] : '';
            });
            $table->editColumn('proactive_mitigation', function ($row) {
                return $row->proactive_mitigation ? $row->proactive_mitigation : '';
            });
            $table->editColumn('l_target', function ($row) {
                return $row->l_target ? $row->l_target : '';
            });
            $table->editColumn('c_target', function ($row) {
                return $row->c_target ? $row->c_target : '';
            });
            $table->editColumn('risk_level_target', function ($row) {
                return $row->risk_level_target ? BriberyRiskAssesment::RISK_LEVEL_TARGET_SELECT[$row->risk_level_target] : '';
            });
            $table->editColumn('opportunity', function ($row) {
                return $row->opportunity ? $row->opportunity : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->addColumn('personal_identification_name', function ($row) {
                return $row->personal_identification ? $row->personal_identification->name : '';
            });
            $table->editColumn('document_number', function ($row) {
                return $row->business_document ? $row->business_document->document_number : '';
            });

            $table->editColumn('reviewed_signature', function ($row) {
                if ($photo = $row->reviewed_signature) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('approved_signature', function ($row) {
                if ($photo = $row->approved_signature) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'atp_process', 'personal_identification', 'reviewed_signature', 'approved_signature']);

            return $table->make(true);
        }

        return view('admin.briberyRiskAssesments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('bribery_risk_assesment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atp_processes = AtpProcess::pluck('activity', 'id')->prepend(trans('global.pleaseSelect'), '');
        $business_documents = BusinessPartnerDocument::where('type','=','bribery-risk')->pluck('document_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personal_identifications = Position::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.briberyRiskAssesments.create', compact('atp_processes','business_documents', 'personal_identifications'));
    }

    public function store(StoreBriberyRiskAssesmentRequest $request)
    {
        $briberyRiskAssesment = BriberyRiskAssesment::create($request->all());

        if ($request->input('reviewed_signature', false)) {
            $briberyRiskAssesment->addMedia(storage_path('tmp/uploads/' . basename($request->input('reviewed_signature'))))->toMediaCollection('reviewed_signature');
        }

        if ($request->input('approved_signature', false)) {
            $briberyRiskAssesment->addMedia(storage_path('tmp/uploads/' . basename($request->input('approved_signature'))))->toMediaCollection('approved_signature');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $briberyRiskAssesment->id]);
        }

        return redirect()->route('admin.bribery-risk-assesments.index');
    }

    public function edit(BriberyRiskAssesment $briberyRiskAssesment)
    {
        abort_if(Gate::denies('bribery_risk_assesment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atp_processes = AtpProcess::pluck('activity', 'id')->prepend(trans('global.pleaseSelect'), '');

        $personal_identifications = Position::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $business_documents = BusinessPartnerDocument::where('type','=','bribery-risk')->pluck('document_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $briberyRiskAssesment->load('atp_process', 'personal_identification');

        return view('admin.briberyRiskAssesments.edit', compact('atp_processes','business_documents', 'personal_identifications', 'briberyRiskAssesment'));
    }

    public function update(UpdateBriberyRiskAssesmentRequest $request, BriberyRiskAssesment $briberyRiskAssesment)
    {
        $briberyRiskAssesment->update($request->all());

        if ($request->input('reviewed_signature', false)) {
            if (!$briberyRiskAssesment->reviewed_signature || $request->input('reviewed_signature') !== $briberyRiskAssesment->reviewed_signature->file_name) {
                if ($briberyRiskAssesment->reviewed_signature) {
                    $briberyRiskAssesment->reviewed_signature->delete();
                }
                $briberyRiskAssesment->addMedia(storage_path('tmp/uploads/' . basename($request->input('reviewed_signature'))))->toMediaCollection('reviewed_signature');
            }
        } elseif ($briberyRiskAssesment->reviewed_signature) {
            $briberyRiskAssesment->reviewed_signature->delete();
        }

        if ($request->input('approved_signature', false)) {
            if (!$briberyRiskAssesment->approved_signature || $request->input('approved_signature') !== $briberyRiskAssesment->approved_signature->file_name) {
                if ($briberyRiskAssesment->approved_signature) {
                    $briberyRiskAssesment->approved_signature->delete();
                }
                $briberyRiskAssesment->addMedia(storage_path('tmp/uploads/' . basename($request->input('approved_signature'))))->toMediaCollection('approved_signature');
            }
        } elseif ($briberyRiskAssesment->approved_signature) {
            $briberyRiskAssesment->approved_signature->delete();
        }

        return redirect()->route('admin.bribery-risk-assesments.index');
    }

    public function show(BriberyRiskAssesment $briberyRiskAssesment)
    {
        abort_if(Gate::denies('bribery_risk_assesment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $briberyRiskAssesment->load('atp_process', 'personal_identification','business_document');

        return view('admin.briberyRiskAssesments.show', compact('briberyRiskAssesment'));
    }

    public function destroy(BriberyRiskAssesment $briberyRiskAssesment)
    {
        abort_if(Gate::denies('bribery_risk_assesment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $briberyRiskAssesment->delete();

        return back();
    }

    public function massDestroy(MassDestroyBriberyRiskAssesmentRequest $request)
    {
        BriberyRiskAssesment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bribery_risk_assesment_create') && Gate::denies('bribery_risk_assesment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BriberyRiskAssesment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
