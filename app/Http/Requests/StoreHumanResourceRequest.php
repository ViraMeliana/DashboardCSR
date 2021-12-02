<?php

namespace App\Http\Requests;

use App\Models\HumanResource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHumanResourceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('human_resource_create');
    }

    public function rules()
    {
        return [
            'position_id' => [
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
