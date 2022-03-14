<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMitigationRequest;
use App\Http\Requests\UpdateMitigationRequest;
use App\Http\Resources\Admin\MitigationResource;
use App\Models\Mitigation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MitigationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mitigation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MitigationResource(Mitigation::with(['risiko', 'person_in_charge'])->get());
    }

    public function store(StoreMitigationRequest $request)
    {
        $mitigation = Mitigation::create($request->all());

        return (new MitigationResource($mitigation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Mitigation $mitigation)
    {
        abort_if(Gate::denies('mitigation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MitigationResource($mitigation->load(['risiko', 'person_in_charge']));
    }

    public function update(UpdateMitigationRequest $request, Mitigation $mitigation)
    {
        $mitigation->update($request->all());

        return (new MitigationResource($mitigation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Mitigation $mitigation)
    {
        abort_if(Gate::denies('mitigation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mitigation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
