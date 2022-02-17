<?php

namespace App\Http\Requests;

use App\Models\Tjsl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTjslRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tjsl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tjsls,id',
        ];
    }
}
