<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBriberyRiskAssesmentRequest;
use App\Http\Requests\UpdateBriberyRiskAssesmentRequest;
use App\Http\Resources\Admin\BriberyRiskAssesmentResource;
use App\Models\BriberyRiskAssesment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BriberyRiskAssesmentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bribery_risk_assesment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BriberyRiskAssesmentResource(BriberyRiskAssesment::with(['atp_process', 'personal_identification'])->get());
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

        return (new BriberyRiskAssesmentResource($briberyRiskAssesment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BriberyRiskAssesment $briberyRiskAssesment)
    {
        abort_if(Gate::denies('bribery_risk_assesment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BriberyRiskAssesmentResource($briberyRiskAssesment->load(['atp_process', 'personal_identification']));
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

        return (new BriberyRiskAssesmentResource($briberyRiskAssesment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BriberyRiskAssesment $briberyRiskAssesment)
    {
        abort_if(Gate::denies('bribery_risk_assesment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $briberyRiskAssesment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
