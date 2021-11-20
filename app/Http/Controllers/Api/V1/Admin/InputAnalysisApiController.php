<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInputAnalysiRequest;
use App\Http\Requests\UpdateInputAnalysiRequest;
use App\Http\Resources\Admin\InputAnalysiResource;
use App\Models\InputAnalysi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InputAnalysisApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('input_analysi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InputAnalysiResource(InputAnalysi::with(['analysis_process'])->get());
    }

    public function store(StoreInputAnalysiRequest $request)
    {
        $inputAnalysi = InputAnalysi::create($request->all());

        return (new InputAnalysiResource($inputAnalysi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateInputAnalysiRequest $request, InputAnalysi $inputAnalysi)
    {
        $inputAnalysi->update($request->all());

        return (new InputAnalysiResource($inputAnalysi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InputAnalysi $inputAnalysi)
    {
        abort_if(Gate::denies('input_analysi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputAnalysi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
