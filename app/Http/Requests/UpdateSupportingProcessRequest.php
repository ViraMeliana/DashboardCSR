<?php

namespace App\Http\Requests;

use App\Models\SupportingProcess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSupportingProcessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supporting_process_edit');
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
