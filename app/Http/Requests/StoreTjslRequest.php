<?php

namespace App\Http\Requests;

use App\Models\Tjsl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTjslRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tjsl_create');
    }

    public function rules()
    {
        return [
            'tpbs.*' => [
                'integer',
            ],
            'tpbs' => [
                'array',
            ],
        ];
    }
}
