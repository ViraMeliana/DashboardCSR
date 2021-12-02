<?php

namespace App\Http\Requests;

use App\Models\SocialMediaSchedule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSocialMediaScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_media_schedule_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'event' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'media' => [
                'array',
            ],
        ];
    }
}
