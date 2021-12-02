<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSocialMediaScheduleRequest;
use App\Http\Requests\UpdateSocialMediaScheduleRequest;
use App\Http\Resources\Admin\SocialMediaScheduleResource;
use App\Models\SocialMediaSchedule;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialMediaScheduleApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('social_media_schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialMediaScheduleResource(SocialMediaSchedule::all());
    }

    public function store(StoreSocialMediaScheduleRequest $request)
    {
        $socialMediaSchedule = SocialMediaSchedule::create($request->all());

        foreach ($request->input('media', []) as $file) {
            $socialMediaSchedule->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('media');
        }

        return (new SocialMediaScheduleResource($socialMediaSchedule))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SocialMediaSchedule $socialMediaSchedule)
    {
        abort_if(Gate::denies('social_media_schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialMediaScheduleResource($socialMediaSchedule);
    }

    public function update(UpdateSocialMediaScheduleRequest $request, SocialMediaSchedule $socialMediaSchedule)
    {
        $socialMediaSchedule->update($request->all());

        if (count($socialMediaSchedule->media) > 0) {
            foreach ($socialMediaSchedule->media as $media) {
                if (!in_array($media->file_name, $request->input('media', []))) {
                    $media->delete();
                }
            }
        }
        $media = $socialMediaSchedule->media->pluck('file_name')->toArray();
        foreach ($request->input('media', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $socialMediaSchedule->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('media');
            }
        }

        return (new SocialMediaScheduleResource($socialMediaSchedule))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SocialMediaSchedule $socialMediaSchedule)
    {
        abort_if(Gate::denies('social_media_schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialMediaSchedule->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
