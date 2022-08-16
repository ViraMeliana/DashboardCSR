<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateWorkInstructionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('work_instruction_edit');
    }

    public function rules()
    {
        return [
            'no_urut' => [
                'integer',
            ],
            'no_ik' => [
                'integer',
            ],
            'work_unit' => [
                'string',
                'required',
            ],
        ];
    }
}
