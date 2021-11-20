<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGoalMeasurementRequest;
use App\Http\Requests\StoreGoalMeasurementRequest;
use App\Http\Requests\UpdateGoalMeasurementRequest;
use App\Models\AnalysisProcess;
use App\Models\GoalMeasurement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GoalMeasurementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('goal_measurement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GoalMeasurement::with(['analysi_process'])->select(sprintf('%s.*', (new GoalMeasurement())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'goal_measurement_show';
                $editGate = 'goal_measurement_edit';
                $deleteGate = 'goal_measurement_delete';
                $crudRoutePart = 'goal-measurements';

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
            $table->editColumn('kpi', function ($row) {
                return $row->kpi ? $row->kpi : '';
            });
            $table->editColumn('target', function ($row) {
                return $row->target ? $row->target : '';
            });
            $table->addColumn('analysi_process_date', function ($row) {
                return $row->analysi_process ? $row->analysi_process->date : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'analysi_process']);

            return $table->make(true);
        }

        return view('admin.goalMeasurements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('goal_measurement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysi_processes = AnalysisProcess::pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.goalMeasurements.create', compact('analysi_processes'));
    }

    public function store(StoreGoalMeasurementRequest $request)
    {
        $goalMeasurement = GoalMeasurement::create($request->all());

        return redirect()->route('admin.goal-measurements.index');
    }

    public function edit(GoalMeasurement $goalMeasurement)
    {
        abort_if(Gate::denies('goal_measurement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysi_processes = AnalysisProcess::pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $goalMeasurement->load('analysi_process');

        return view('admin.goalMeasurements.edit', compact('analysi_processes', 'goalMeasurement'));
    }

    public function update(UpdateGoalMeasurementRequest $request, GoalMeasurement $goalMeasurement)
    {
        $goalMeasurement->update($request->all());

        return redirect()->route('admin.goal-measurements.index');
    }

    public function destroy(GoalMeasurement $goalMeasurement)
    {
        abort_if(Gate::denies('goal_measurement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $goalMeasurement->delete();

        return back();
    }

    public function massDestroy(MassDestroyGoalMeasurementRequest $request)
    {
        GoalMeasurement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
