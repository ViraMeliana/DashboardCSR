<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHumanResourceRequest;
use App\Http\Requests\UpdateHumanResourceRequest;
use App\Http\Resources\Admin\HumanResourceResource;
use App\Models\HumanResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HumanResourcesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('human_resource_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HumanResourceResource(HumanResource::with(['user'])->get());
    }

    public function store(StoreHumanResourceRequest $request)
    {
        $humanResource = HumanResource::create($request->all());

        return (new HumanResourceResource($humanResource))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HumanResource $humanResource)
    {
        abort_if(Gate::denies('human_resource_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HumanResourceResource($humanResource->load(['user']));
    }

    public function update(UpdateHumanResourceRequest $request, HumanResource $humanResource)
    {
        $humanResource->update($request->all());

        return (new HumanResourceResource($humanResource))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HumanResource $humanResource)
    {
        abort_if(Gate::denies('human_resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $humanResource->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
