<?php

namespace App\Http\Requests;

use App\Models\AtpProcess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAtpProcessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('atp_process_create');
    }

    public function rules()
    {
        return [
            'activity' => [
                'string',
                'required',
            ],
            'transaction' => [
                'string',
                'nullable',
            ],
            'project' => [
                'string',
                'nullable',
            ],
        ];
    }
}
