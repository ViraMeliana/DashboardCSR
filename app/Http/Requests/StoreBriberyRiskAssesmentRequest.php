<?php

namespace App\Http\Requests;

use App\Models\BriberyRiskAssesment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBriberyRiskAssesmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bribery_risk_assesment_create');
    }

    public function rules()
    {
        return [
            'atp_process_id' => [
                'required',
                'integer',
            ],
            'requirements' => [
                'required',
            ],
            'bribery_risk' => [
                'required',
            ],
            'impact' => [
                'required',
            ],
            'risk_causes' => [
                'required',
            ],
            'internal_control' => [
                'required',
            ],
            'l' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'c' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'criteria_impact' => [
                'string',
                'required',
            ],
            'risk_level' => [
                'required',
            ],
            'l_target' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'c_target' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'risk_level_target' => [
                'required',
            ],
            'personal_identification_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
