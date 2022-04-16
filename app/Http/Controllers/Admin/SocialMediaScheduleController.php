<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySocialMediaScheduleRequest;
use App\Http\Requests\StoreSocialMediaScheduleRequest;
use App\Http\Requests\UpdateSocialMediaScheduleRequest;
use App\Models\SocialMediaSchedule;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Symfony\Component\HttpFoundation\Response;

class SocialMediaScheduleController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('social_media_schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialMediaSchedules = SocialMediaSchedule::with(['media'])->get();

        return view('admin.socialMediaSchedules.index', compact('socialMediaSchedules'));
    }

    public function create()
    {
        abort_if(Gate::denies('social_media_schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialMediaSchedules.create');
    }

    public function store(StoreSocialMediaScheduleRequest $request)
    {
        $socialMediaSchedule = SocialMediaSchedule::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $socialMediaSchedule->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $socialMediaSchedule->id]);
        }

        return redirect()->route('admin.social-media-schedules.index');
    }

    public function edit(SocialMediaSchedule $socialMediaSchedule)
    {
        abort_if(Gate::denies('social_media_schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialMediaSchedules.edit', compact('socialMediaSchedule'));
    }

    public function update(UpdateSocialMediaScheduleRequest $request, SocialMediaSchedule $socialMediaSchedule)
    {
        $socialMediaSchedule->update($request->all());

        if (count($socialMediaSchedule->photos) > 0) {
            foreach ($socialMediaSchedule->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $socialMediaSchedule->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $socialMediaSchedule->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.social-media-schedules.index');
    }

    public function show(SocialMediaSchedule $socialMediaSchedule)
    {
        abort_if(Gate::denies('social_media_schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialMediaSchedules.show', compact('socialMediaSchedule'));
    }

    public function destroy(SocialMediaSchedule $socialMediaSchedule)
    {
        abort_if(Gate::denies('social_media_schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialMediaSchedule->delete();

        return back();
    }

    public function massDestroy(MassDestroySocialMediaScheduleRequest $request)
    {
        SocialMediaSchedule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('social_media_schedule_create') && Gate::denies('social_media_schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SocialMediaSchedule();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
