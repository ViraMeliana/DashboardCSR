<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRiskMitigationMonitoringRequest;
use App\Http\Requests\UpdateRiskMitigationMonitoringRequest;
use App\Http\Resources\Admin\RiskMitigationMonitoringResource;
use App\Models\RiskMitigationMonitoring;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RiskMitigationMonitoringApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RiskMitigationMonitoringResource(RiskMitigationMonitoring::with(['responsible'])->get());
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

        return (new RiskMitigationMonitoringResource($riskMitigationMonitoring))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RiskMitigationMonitoring $riskMitigationMonitoring)
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RiskMitigationMonitoringResource($riskMitigationMonitoring->load(['responsible']));
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

        return (new RiskMitigationMonitoringResource($riskMitigationMonitoring))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RiskMitigationMonitoring $riskMitigationMonitoring)
    {
        abort_if(Gate::denies('risk_mitigation_monitoring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riskMitigationMonitoring->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
