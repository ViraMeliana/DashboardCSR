<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRisikoRequest;
use App\Http\Requests\UpdateRisikoRequest;
use App\Http\Resources\Admin\RisikoResource;
use App\Models\Risiko;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RisikoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('risiko_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RisikoResource(Risiko::all());
    }

    public function store(StoreRisikoRequest $request)
    {
        $risiko = Risiko::create($request->all());

        return (new RisikoResource($risiko))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Risiko $risiko)
    {
        abort_if(Gate::denies('risiko_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RisikoResource($risiko);
    }

    public function update(UpdateRisikoRequest $request, Risiko $risiko)
    {
        $risiko->update($request->all());

        return (new RisikoResource($risiko))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Risiko $risiko)
    {
        abort_if(Gate::denies('risiko_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $risiko->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
