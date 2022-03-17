<?php

namespace App\Http\Requests;

use App\Models\RealtimeActivity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRealtimeActivityRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'type' => [
                'required',
            ],
            'total' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'location' => [
                'required',
            ],
            'receiver' => [
                'string',
                'required',
            ],
            'number_of_beneficiaries' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
