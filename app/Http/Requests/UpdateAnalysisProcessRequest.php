<?php

namespace App\Http\Requests;

use App\Models\AnalysisProcess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnalysisProcessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('analysis_process_edit');
    }

    public function rules()
    {
        return [
            'resources.*' => [
                'integer',
            ],
            'resources' => [
                'required',
                'array',
            ],
            'main_jobs.*' => [
                'integer',
            ],
            'main_jobs' => [
                'required',
                'array',
            ],
            'human_resources.*' => [
                'integer',
            ],
            'human_resources' => [
                'required',
                'array',
            ],
            'methods.*' => [
                'integer',
            ],
            'methods' => [
                'required',
                'array',
            ],
            'supporting_processes.*' => [
                'integer',
            ],
            'supporting_processes' => [
                'required',
                'array',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
