<?php

namespace App\Http\Requests;

use App\Models\Pilar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePilarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pilar_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
