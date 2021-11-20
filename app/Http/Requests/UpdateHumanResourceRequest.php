<?php

namespace App\Http\Requests;

use App\Models\HumanResource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHumanResourceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('human_resource_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'competence' => [
                'string',
                'required',
            ],
            'awareness' => [
                'string',
                'required',
            ],
            'scope' => [
                'required',
            ],
            'jobdesc' => [
                'required',
            ],
        ];
    }
}
