<?php

namespace App\Http\Requests;

use App\Models\OutputAnalysi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOutputAnalysiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('output_analysi_create');
    }

    public function rules()
    {
        return [
            'output' => [
                'string',
                'required',
            ],
        ];
    }
}
