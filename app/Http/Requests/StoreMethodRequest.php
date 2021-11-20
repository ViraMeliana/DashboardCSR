<?php

namespace App\Http\Requests;

use App\Models\Method;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMethodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('method_create');
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
