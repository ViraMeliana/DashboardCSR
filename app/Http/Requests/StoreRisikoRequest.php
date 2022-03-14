<?php

namespace App\Http\Requests;

use App\Models\Risiko;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRisikoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('risiko_create');
    }

    public function rules()
    {
        return [
            'subject' => [
                'string',
                'required',
            ],
            'cause' => [
                'required',
            ],
        ];
    }
}
