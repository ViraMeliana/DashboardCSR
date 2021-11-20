<?php

namespace App\Http\Requests;

use App\Models\GoalMeasurement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGoalMeasurementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('goal_measurement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:goal_measurements,id',
        ];
    }
}
