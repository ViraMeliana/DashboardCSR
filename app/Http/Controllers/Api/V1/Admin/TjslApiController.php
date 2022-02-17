<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTjslRequest;
use App\Http\Requests\UpdateTjslRequest;
use App\Http\Resources\Admin\TjslResource;
use App\Models\Tjsl;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TjslApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tjsl_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TjslResource(Tjsl::with(['tpbs'])->get());
    }

    public function store(StoreTjslRequest $request)
    {
        $tjsl = Tjsl::create($request->all());
        $tjsl->tpbs()->sync($request->input('tpbs', []));

        return (new TjslResource($tjsl))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tjsl $tjsl)
    {
        abort_if(Gate::denies('tjsl_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TjslResource($tjsl->load(['tpbs']));
    }

    public function update(UpdateTjslRequest $request, Tjsl $tjsl)
    {
        $tjsl->update($request->all());
        $tjsl->tpbs()->sync($request->input('tpbs', []));

        return (new TjslResource($tjsl))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tjsl $tjsl)
    {
        abort_if(Gate::denies('tjsl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tjsl->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
