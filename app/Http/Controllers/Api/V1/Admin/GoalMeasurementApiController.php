<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoalMeasurementRequest;
use App\Http\Requests\UpdateGoalMeasurementRequest;
use App\Http\Resources\Admin\GoalMeasurementResource;
use App\Models\GoalMeasurement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GoalMeasurementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('goal_measurement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GoalMeasurementResource(GoalMeasurement::with(['analysi_process'])->get());
    }

    public function store(StoreGoalMeasurementRequest $request)
    {
        $goalMeasurement = GoalMeasurement::create($request->all());

        return (new GoalMeasurementResource($goalMeasurement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateGoalMeasurementRequest $request, GoalMeasurement $goalMeasurement)
    {
        $goalMeasurement->update($request->all());

        return (new GoalMeasurementResource($goalMeasurement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GoalMeasurement $goalMeasurement)
    {
        abort_if(Gate::denies('goal_measurement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $goalMeasurement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
