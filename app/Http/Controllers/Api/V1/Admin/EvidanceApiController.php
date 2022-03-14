<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvidanceRequest;
use App\Http\Requests\UpdateEvidanceRequest;
use App\Http\Resources\Admin\EvidanceResource;
use App\Models\Evidance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EvidanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('evidance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EvidanceResource(Evidance::with(['mitigation'])->get());
    }

    public function store(StoreEvidanceRequest $request)
    {
        $evidance = Evidance::create($request->all());

        return (new EvidanceResource($evidance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Evidance $evidance)
    {
        abort_if(Gate::denies('evidance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EvidanceResource($evidance->load(['mitigation']));
    }

    public function update(UpdateEvidanceRequest $request, Evidance $evidance)
    {
        $evidance->update($request->all());

        return (new EvidanceResource($evidance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Evidance $evidance)
    {
        abort_if(Gate::denies('evidance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evidance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
