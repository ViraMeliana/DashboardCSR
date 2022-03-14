<?php

namespace App\Http\Requests;

use App\Models\Mitigation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMitigationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mitigation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mitigations,id',
        ];
    }
}
