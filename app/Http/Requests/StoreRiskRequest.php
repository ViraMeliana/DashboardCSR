<?php

namespace App\Http\Requests;

use App\Models\Risk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRiskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('risk_create');
    }

    public function rules()
    {
        return [
            'risk_name' => [
                'string',
                'required',
            ],
            'risk_process' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'likelihood_baseline' => [
                'string',
                'required',
            ],
            'consequences_baseline' => [
                'string',
                'required',
            ],
            'iso' => [
                'required',
            ],
            'existing_control' => [
                'required',
            ],
            'effectiveness' => [
                'required',
            ],
            'risk_cause' => [
                'required',
            ],
            'proactive_mitigation' => [
                'required',
            ],
            'likelihood_target' => [
                'string',
                'required',
            ],
            'consequences_target' => [
                'string',
                'required',
            ],
            'impact' => [
                'required',
            ],
            'time_schedule' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
