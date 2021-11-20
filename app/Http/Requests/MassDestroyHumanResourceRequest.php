<?php

namespace App\Http\Requests;

use App\Models\HumanResource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHumanResourceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('human_resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:human_resources,id',
        ];
    }
}
