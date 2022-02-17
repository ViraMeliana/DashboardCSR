<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePilarRequest;
use App\Http\Requests\UpdatePilarRequest;
use App\Http\Resources\Admin\PilarResource;
use App\Models\Pilar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PilarApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pilar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PilarResource(Pilar::all());
    }

    public function store(StorePilarRequest $request)
    {
        $pilar = Pilar::create($request->all());

        return (new PilarResource($pilar))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pilar $pilar)
    {
        abort_if(Gate::denies('pilar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PilarResource($pilar);
    }

    public function update(UpdatePilarRequest $request, Pilar $pilar)
    {
        $pilar->update($request->all());

        return (new PilarResource($pilar))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pilar $pilar)
    {
        abort_if(Gate::denies('pilar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pilar->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
