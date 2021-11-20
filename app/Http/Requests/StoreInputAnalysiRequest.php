<?php

namespace App\Http\Requests;

use App\Models\InputAnalysi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInputAnalysiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('input_analysi_create');
    }

    public function rules()
    {
        return [
            'input' => [
                'string',
                'required',
            ],
            'analysis_process_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
