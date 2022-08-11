<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StoreTjslInsidentilRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tjsl_insidentil_create');
    }

    public function rules()
    {
        return [
            'rka' => [
                'string',
                'required',
            ],
            'cash_out' => [
                'string',
                'required',
            ],
            'commited' => [
                'string',
                'required',
            ],
            'realization' => [
                'string',
                'required',
            ],
        ];
    }
}
