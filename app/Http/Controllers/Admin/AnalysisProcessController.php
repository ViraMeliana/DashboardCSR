<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnalysisProcessRequest;
use App\Http\Requests\StoreAnalysisProcessRequest;
use App\Http\Requests\UpdateAnalysisProcessRequest;
use App\Models\AnalysisProcess;
use App\Models\HumanResource;
use App\Models\Job;
use App\Models\Method;
use App\Models\Resource;
use App\Models\SupportingProcess;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AnalysisProcessController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('analysis_process_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AnalysisProcess::with(['resources', 'main_jobs', 'human_resources', 'methods', 'supporting_processes'])->select(sprintf('%s.*', (new AnalysisProcess())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'analysis_process_show';
                $editGate = 'analysis_process_edit';
                $deleteGate = 'analysis_process_delete';
                $crudRoutePart = 'analysis-processes';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('resources', function ($row) {
                $labels = [];
                foreach ($row->resources as $resource) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $resource->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('main_job', function ($row) {
                $labels = [];
                foreach ($row->main_jobs as $main_job) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $main_job->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('human_resource', function ($row) {
                $labels = [];
                foreach ($row->human_resources as $human_resource) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $human_resource->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('method', function ($row) {
                $labels = [];
                foreach ($row->methods as $method) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $method->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('supporting_process', function ($row) {
                $labels = [];
                foreach ($row->supporting_processes as $supporting_process) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $supporting_process->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'resources', 'main_job', 'human_resource', 'method', 'supporting_process']);

            return $table->make(true);
        }

        return view('admin.analysisProcesses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('analysis_process_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resources = Resource::pluck('name', 'id');

        $main_jobs = Job::pluck('name', 'id');

        $human_resources = HumanResource::pluck('position_id', 'id');

        $methods = Method::pluck('name', 'id');

        $supporting_processes = SupportingProcess::pluck('name', 'id');

        return view('admin.analysisProcesses.create', compact('resources', 'main_jobs', 'human_resources', 'methods', 'supporting_processes'));
    }

    public function store(StoreAnalysisProcessRequest $request)
    {
        $analysisProcess = AnalysisProcess::create($request->all());
        $analysisProcess->resources()->sync($request->input('resources', []));
        $analysisProcess->main_jobs()->sync($request->input('main_jobs', []));
        $analysisProcess->human_resources()->sync($request->input('human_resources', []));
        $analysisProcess->methods()->sync($request->input('methods', []));
        $analysisProcess->supporting_processes()->sync($request->input('supporting_processes', []));

        return redirect()->route('admin.analysis-processes.index');
    }

    public function edit(AnalysisProcess $analysisProcess)
    {
        abort_if(Gate::denies('analysis_process_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resources = Resource::pluck('name', 'id');

        $main_jobs = Job::pluck('name', 'id');

        $human_resources = HumanResource::pluck('name', 'id');

        $methods = Method::pluck('name', 'id');

        $supporting_processes = SupportingProcess::pluck('name', 'id');

        $analysisProcess->load('resources', 'main_jobs', 'human_resources', 'methods', 'supporting_processes');

        return view('admin.analysisProcesses.edit', compact('resources', 'main_jobs', 'human_resources', 'methods', 'supporting_processes', 'analysisProcess'));
    }

    public function update(UpdateAnalysisProcessRequest $request, AnalysisProcess $analysisProcess)
    {
        $analysisProcess->update($request->all());
        $analysisProcess->resources()->sync($request->input('resources', []));
        $analysisProcess->main_jobs()->sync($request->input('main_jobs', []));
        $analysisProcess->human_resources()->sync($request->input('human_resources', []));
        $analysisProcess->methods()->sync($request->input('methods', []));
        $analysisProcess->supporting_processes()->sync($request->input('supporting_processes', []));

        return redirect()->route('admin.analysis-processes.index');
    }

    public function show(AnalysisProcess $analysisProcess)
    {
        abort_if(Gate::denies('analysis_process_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysisProcess->load('resources', 'main_jobs', 'human_resources', 'methods', 'supporting_processes');

        return view('admin.analysisProcesses.show', compact('analysisProcess'));
    }

    public function destroy(AnalysisProcess $analysisProcess)
    {
        abort_if(Gate::denies('analysis_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysisProcess->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnalysisProcessRequest $request)
    {
        AnalysisProcess::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
