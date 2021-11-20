<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessPartnerRequest;
use App\Http\Requests\UpdateBusinessPartnerRequest;
use App\Http\Resources\Admin\BusinessPartnerResource;
use App\Models\BusinessPartner;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusinessPartnerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('business_partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BusinessPartnerResource(BusinessPartner::all());
    }

    public function store(StoreBusinessPartnerRequest $request)
    {
        $businessPartner = BusinessPartner::create($request->all());

        return (new BusinessPartnerResource($businessPartner))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateBusinessPartnerRequest $request, BusinessPartner $businessPartner)
    {
        $businessPartner->update($request->all());

        return (new BusinessPartnerResource($businessPartner))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BusinessPartner $businessPartner)
    {
        abort_if(Gate::denies('business_partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartner->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
