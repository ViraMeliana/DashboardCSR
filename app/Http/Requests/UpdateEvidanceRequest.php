<?php

namespace App\Http\Requests;

use App\Models\Evidance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEvidanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('evidance_edit');
    }

    public function rules()
    {
        return [
            'mitigation_id' => [
                'required',
                'integer',
            ],
            'code' => [
                'string',
                'required',
            ],
            'subject' => [
                'string',
                'required',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
