<?php

namespace App\Http\Requests;

use App\Models\SocialMediaSchedule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySocialMediaScheduleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('social_media_schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:social_media_schedules,id',
        ];
    }
}
