<?php

namespace App\Http\Requests;

use App\Models\Tpb;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTpbRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tpb_edit');
    }

    public function rules()
    {
        return [
            'tpb_number' => [
                'string',
                'required',
            ],
            'rka' => [
                'string',
                'required',
            ],
            'cash_out' => [
                'string',
                'required',
            ],
            'commited' => [
                'string',
                'required',
            ],
            'realization' => [
                'string',
                'required',
            ],
            'periode' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pilar_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
