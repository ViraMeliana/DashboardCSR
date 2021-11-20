<?php

namespace App\Http\Requests;

use App\Models\SupportingProcess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSupportingProcessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supporting_process_create');
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
