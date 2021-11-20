<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessPartnerIdentificationRequest;
use App\Http\Requests\UpdateBusinessPartnerIdentificationRequest;
use App\Http\Resources\Admin\BusinessPartnerIdentificationResource;
use App\Models\BusinessPartnerIdentification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusinessPartnerIdentificationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('business_partner_identification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BusinessPartnerIdentificationResource(BusinessPartnerIdentification::with(['business_partner'])->get());
    }

    public function store(StoreBusinessPartnerIdentificationRequest $request)
    {
        $businessPartnerIdentification = BusinessPartnerIdentification::create($request->all());

        return (new BusinessPartnerIdentificationResource($businessPartnerIdentification))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BusinessPartnerIdentification $businessPartnerIdentification)
    {
        abort_if(Gate::denies('business_partner_identification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BusinessPartnerIdentificationResource($businessPartnerIdentification->load(['business_partner']));
    }

    public function update(UpdateBusinessPartnerIdentificationRequest $request, BusinessPartnerIdentification $businessPartnerIdentification)
    {
        $businessPartnerIdentification->update($request->all());

        return (new BusinessPartnerIdentificationResource($businessPartnerIdentification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BusinessPartnerIdentification $businessPartnerIdentification)
    {
        abort_if(Gate::denies('business_partner_identification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartnerIdentification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
