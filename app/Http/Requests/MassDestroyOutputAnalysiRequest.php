<?php

namespace App\Http\Requests;

use App\Models\OutputAnalysi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOutputAnalysiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('output_analysi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:output_analysis,id',
        ];
    }
}
