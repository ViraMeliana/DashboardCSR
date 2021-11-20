<?php

namespace App\Http\Requests;

use App\Models\SupportingProcess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySupportingProcessRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('supporting_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:supporting_processes,id',
        ];
    }
}
