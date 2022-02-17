<?php

namespace App\Http\Requests;

use App\Models\Tpb;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTpbRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tpb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tpbs,id',
        ];
    }
}
