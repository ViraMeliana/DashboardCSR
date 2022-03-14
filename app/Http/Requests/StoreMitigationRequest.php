<?php

namespace App\Http\Requests;

use App\Models\Mitigation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMitigationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mitigation_create');
    }

    public function rules()
    {
        return [
            'risiko_id' => [
                'required',
                'integer',
            ],
            'subject' => [
                'string',
                'required',
            ],
            'category' => [
                'required',
            ],
        ];
    }
}
