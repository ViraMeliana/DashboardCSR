<?php

namespace App\Http\Requests;

use App\Models\BriberyRiskAssesment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBriberyRiskAssesmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bribery_risk_assesment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bribery_risk_assesments,id',
        ];
    }
}
