<?php

namespace App\Http\Requests;

use App\Models\Risiko;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRisikoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('risiko_edit');
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
