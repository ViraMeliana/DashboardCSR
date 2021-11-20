<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportingProcessRequest;
use App\Http\Requests\UpdateSupportingProcessRequest;
use App\Http\Resources\Admin\SupportingProcessResource;
use App\Models\SupportingProcess;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupportingProcessApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('supporting_process_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupportingProcessResource(SupportingProcess::all());
    }

    public function store(StoreSupportingProcessRequest $request)
    {
        $supportingProcess = SupportingProcess::create($request->all());

        return (new SupportingProcessResource($supportingProcess))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateSupportingProcessRequest $request, SupportingProcess $supportingProcess)
    {
        $supportingProcess->update($request->all());

        return (new SupportingProcessResource($supportingProcess))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SupportingProcess $supportingProcess)
    {
        abort_if(Gate::denies('supporting_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportingProcess->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
