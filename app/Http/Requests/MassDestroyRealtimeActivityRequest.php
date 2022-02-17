<?php

namespace App\Http\Requests;

use App\Models\RealtimeActivity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRealtimeActivityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('realtime_activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:realtime_activities,id',
        ];
    }
}
