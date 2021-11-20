<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnalysisProcessRequest;
use App\Http\Requests\UpdateAnalysisProcessRequest;
use App\Http\Resources\Admin\AnalysisProcessResource;
use App\Models\AnalysisProcess;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnalysisProcessApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('analysis_process_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AnalysisProcessResource(AnalysisProcess::with(['resources', 'main_jobs', 'human_resources', 'methods', 'supporting_processes'])->get());
    }

    public function store(StoreAnalysisProcessRequest $request)
    {
        $analysisProcess = AnalysisProcess::create($request->all());
        $analysisProcess->resources()->sync($request->input('resources', []));
        $analysisProcess->main_jobs()->sync($request->input('main_jobs', []));
        $analysisProcess->human_resources()->sync($request->input('human_resources', []));
        $analysisProcess->methods()->sync($request->input('methods', []));
        $analysisProcess->supporting_processes()->sync($request->input('supporting_processes', []));

        return (new AnalysisProcessResource($analysisProcess))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AnalysisProcess $analysisProcess)
    {
        abort_if(Gate::denies('analysis_process_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AnalysisProcessResource($analysisProcess->load(['resources', 'main_jobs', 'human_resources', 'methods', 'supporting_processes']));
    }

    public function update(UpdateAnalysisProcessRequest $request, AnalysisProcess $analysisProcess)
    {
        $analysisProcess->update($request->all());
        $analysisProcess->resources()->sync($request->input('resources', []));
        $analysisProcess->main_jobs()->sync($request->input('main_jobs', []));
        $analysisProcess->human_resources()->sync($request->input('human_resources', []));
        $analysisProcess->methods()->sync($request->input('methods', []));
        $analysisProcess->supporting_processes()->sync($request->input('supporting_processes', []));

        return (new AnalysisProcessResource($analysisProcess))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AnalysisProcess $analysisProcess)
    {
        abort_if(Gate::denies('analysis_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysisProcess->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
