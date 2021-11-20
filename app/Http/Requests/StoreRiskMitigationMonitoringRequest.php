<?php

namespace App\Http\Requests;

use App\Models\RiskMitigationMonitoring;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRiskMitigationMonitoringRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('risk_mitigation_monitoring_create');
    }

    public function rules()
    {
        return [
            'proactive_mitigation' => [
                'string',
                'required',
            ],
            'plan_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'realization_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'l' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'c' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'responsible_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
