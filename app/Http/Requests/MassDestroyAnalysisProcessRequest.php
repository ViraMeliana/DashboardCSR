<?php

namespace App\Http\Requests;

use App\Models\AnalysisProcess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAnalysisProcessRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('analysis_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:analysis_processes,id',
        ];
    }
}
