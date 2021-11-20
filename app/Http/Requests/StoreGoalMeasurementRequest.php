<?php

namespace App\Http\Requests;

use App\Models\GoalMeasurement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGoalMeasurementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('goal_measurement_create');
    }

    public function rules()
    {
        return [
            'kpi' => [
                'string',
                'required',
            ],
            'target' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'analysi_process_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
