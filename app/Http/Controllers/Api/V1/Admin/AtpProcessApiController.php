<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAtpProcessRequest;
use App\Http\Requests\UpdateAtpProcessRequest;
use App\Http\Resources\Admin\AtpProcessResource;
use App\Models\AtpProcess;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AtpProcessApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('atp_process_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AtpProcessResource(AtpProcess::all());
    }

    public function store(StoreAtpProcessRequest $request)
    {
        $atpProcess = AtpProcess::create($request->all());

        return (new AtpProcessResource($atpProcess))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AtpProcess $atpProcess)
    {
        abort_if(Gate::denies('atp_process_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AtpProcessResource($atpProcess);
    }

    public function update(UpdateAtpProcessRequest $request, AtpProcess $atpProcess)
    {
        $atpProcess->update($request->all());

        return (new AtpProcessResource($atpProcess))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AtpProcess $atpProcess)
    {
        abort_if(Gate::denies('atp_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atpProcess->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
