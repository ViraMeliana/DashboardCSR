<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRiskMitigationMonitoringRequest;
use App\Http\Requests\StoreRiskMitigationMonitoringRequest;
use App\Http\Requests\UpdateRiskMitigationMonitoringRequest;
use App\Models\DocumentManagement;
use App\Models\RiskMitigationMonitoring;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RiskMitigationMonitoringController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RiskMitigationMonitoring::with(['responsible','business_document'])->select(sprintf('%s.*', (new RiskMitigationMonitoring())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'risk_mitigation_monitoring_show';
                $editGate = 'risk_mitigation_monitoring_edit';
                $deleteGate = 'risk_mitigation_monitoring_delete';
                $crudRoutePart = 'risk-mitigation-monitorings';

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
            $table->editColumn('target', function ($row) {
                return $row->target ? $row->target : '';
            });
            $table->editColumn('goal', function ($row) {
                return $row->goal ? $row->goal : '';
            });
            $table->editColumn('revision', function ($row) {
                return $row->revision ? $row->revision : '';
            });
            $table->editColumn('proactive_mitigation', function ($row) {
                return $row->proactive_mitigation ? $row->proactive_mitigation : '';
            });

            $table->editColumn('l', function ($row) {
                return $row->l ? $row->l : '';
            });
            $table->editColumn('c', function ($row) {
                return $row->c ? $row->c : '';
            });
            $table->editColumn('risk_level', function ($row) {
                return $row->risk_level ? RiskMitigationMonitoring::RISK_LEVEL_SELECT[$row->risk_level] : '';
            });
            $table->addColumn('responsible_name', function ($row) {
                return $row->responsible ? $row->responsible->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? RiskMitigationMonitoring::STATUS_SELECT[$row->status] : '';
            });

            $table->editColumn('document_number', function ($row) {
                return $row->business_document ? $row->business_document->document_number : '';
            });

            $table->editColumn('accepted_signature', function ($row) {
                if ($photo = $row->accepted_signature) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('check_signature', function ($row) {
                if ($photo = $row->check_signature) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('prepare_signature', function ($row) {
                if ($photo = $row->prepare_signature) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'responsible', 'accepted_signature', 'check_signature', 'prepare_signature']);

            return $table->make(true);
        }

        return view('admin.riskMitigationMonitorings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $business_documents = DocumentManagement::where('type','=','rm3p')->pluck('document_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $responsibles = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.riskMitigationMonitorings.create', compact('responsibles','business_documents'));
    }

    public function store(StoreRiskMitigationMonitoringRequest $request)
    {
        $riskMitigationMonitoring = RiskMitigationMonitoring::create($request->all());

        if ($request->input('accepted_signature', false)) {
            $riskMitigationMonitoring->addMedia(storage_path('tmp/uploads/' . basename($request->input('accepted_signature'))))->toMediaCollection('accepted_signature');
        }

        if ($request->input('check_signature', false)) {
            $riskMitigationMonitoring->addMedia(storage_path('tmp/uploads/' . basename($request->input('check_signature'))))->toMediaCollection('check_signature');
        }

        if ($request->input('prepare_signature', false)) {
            $riskMitigationMonitoring->addMedia(storage_path('tmp/uploads/' . basename($request->input('prepare_signature'))))->toMediaCollection('prepare_signature');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $riskMitigationMonitoring->id]);
        }

        return redirect()->route('admin.risk-mitigation-monitorings.index');
    }

    public function edit(RiskMitigationMonitoring $riskMitigationMonitoring)
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $business_documents = DocumentManagement::where('type','=','rm3p')->pluck('document_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $riskMitigationMonitoring->load('responsible');

        return view('admin.riskMitigationMonitorings.edit', compact('responsibles','business_documents', 'riskMitigationMonitoring'));
    }

    public function update(UpdateRiskMitigationMonitoringRequest $request, RiskMitigationMonitoring $riskMitigationMonitoring)
    {
        $riskMitigationMonitoring->update($request->all());

        if ($request->input('accepted_signature', false)) {
            if (!$riskMitigationMonitoring->accepted_signature || $request->input('accepted_signature') !== $riskMitigationMonitoring->accepted_signature->file_name) {
                if ($riskMitigationMonitoring->accepted_signature) {
                    $riskMitigationMonitoring->accepted_signature->delete();
                }
                $riskMitigationMonitoring->addMedia(storage_path('tmp/uploads/' . basename($request->input('accepted_signature'))))->toMediaCollection('accepted_signature');
            }
        } elseif ($riskMitigationMonitoring->accepted_signature) {
            $riskMitigationMonitoring->accepted_signature->delete();
        }

        if ($request->input('check_signature', false)) {
            if (!$riskMitigationMonitoring->check_signature || $request->input('check_signature') !== $riskMitigationMonitoring->check_signature->file_name) {
                if ($riskMitigationMonitoring->check_signature) {
                    $riskMitigationMonitoring->check_signature->delete();
                }
                $riskMitigationMonitoring->addMedia(storage_path('tmp/uploads/' . basename($request->input('check_signature'))))->toMediaCollection('check_signature');
            }
        } elseif ($riskMitigationMonitoring->check_signature) {
            $riskMitigationMonitoring->check_signature->delete();
        }

        if ($request->input('prepare_signature', false)) {
            if (!$riskMitigationMonitoring->prepare_signature || $request->input('prepare_signature') !== $riskMitigationMonitoring->prepare_signature->file_name) {
                if ($riskMitigationMonitoring->prepare_signature) {
                    $riskMitigationMonitoring->prepare_signature->delete();
                }
                $riskMitigationMonitoring->addMedia(storage_path('tmp/uploads/' . basename($request->input('prepare_signature'))))->toMediaCollection('prepare_signature');
            }
        } elseif ($riskMitigationMonitoring->prepare_signature) {
            $riskMitigationMonitoring->prepare_signature->delete();
        }

        return redirect()->route('admin.risk-mitigation-monitorings.index');
    }

    public function show(RiskMitigationMonitoring $riskMitigationMonitoring)
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riskMitigationMonitoring->load('responsible');

        return view('admin.riskMitigationMonitorings.show', compact('riskMitigationMonitoring'));
    }

    public function destroy(RiskMitigationMonitoring $riskMitigationMonitoring)
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riskMitigationMonitoring->delete();

        return back();
    }

    public function massDestroy(MassDestroyRiskMitigationMonitoringRequest $request)
    {
        RiskMitigationMonitoring::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_create') && Gate::denies('risk_mitigation_monitoring_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RiskMitigationMonitoring();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
