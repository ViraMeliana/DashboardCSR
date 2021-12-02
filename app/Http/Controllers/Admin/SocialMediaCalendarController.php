<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SocialMediaCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\SocialMediaSchedule',
            'date_field' => 'date',
            'field'      => 'event',
            'prefix'     => 'Event',
            'suffix'     => 'will start',
            'route'      => 'admin.social-media-schedules.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.socialMediaSchedules.calendar', compact('events'));
    }
}
