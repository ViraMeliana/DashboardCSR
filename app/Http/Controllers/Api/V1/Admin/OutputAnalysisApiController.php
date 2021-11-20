<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutputAnalysiRequest;
use App\Http\Requests\UpdateOutputAnalysiRequest;
use App\Http\Resources\Admin\OutputAnalysiResource;
use App\Models\OutputAnalysi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutputAnalysisApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('output_analysi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutputAnalysiResource(OutputAnalysi::with(['analysis_process'])->get());
    }

    public function store(StoreOutputAnalysiRequest $request)
    {
        $outputAnalysi = OutputAnalysi::create($request->all());

        return (new OutputAnalysiResource($outputAnalysi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateOutputAnalysiRequest $request, OutputAnalysi $outputAnalysi)
    {
        $outputAnalysi->update($request->all());

        return (new OutputAnalysiResource($outputAnalysi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OutputAnalysi $outputAnalysi)
    {
        abort_if(Gate::denies('output_analysi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputAnalysi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
