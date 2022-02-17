<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRealtimeActivityRequest;
use App\Http\Requests\StoreRealtimeActivityRequest;
use App\Http\Requests\UpdateRealtimeActivityRequest;
use App\Models\RealtimeActivity;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RealtimeActivityController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('realtime_activity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realtimeActivities = RealtimeActivity::with(['media'])->get();

        return view('admin.realtimeActivities.index', compact('realtimeActivities'));
    }

    public function create()
    {
        abort_if(Gate::denies('realtime_activity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.realtimeActivities.create');
    }

    public function store(StoreRealtimeActivityRequest $request)
    {
        $realtimeActivity = RealtimeActivity::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $realtimeActivity->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $realtimeActivity->id]);
        }

        return redirect()->route('admin.realtime-activities.index');
    }

    public function edit(RealtimeActivity $realtimeActivity)
    {
        abort_if(Gate::denies('realtime_activity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.realtimeActivities.edit', compact('realtimeActivity'));
    }

    public function update(UpdateRealtimeActivityRequest $request, RealtimeActivity $realtimeActivity)
    {
        $realtimeActivity->update($request->all());

        if (count($realtimeActivity->photo) > 0) {
            foreach ($realtimeActivity->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $realtimeActivity->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $realtimeActivity->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.realtime-activities.index');
    }

    public function show(RealtimeActivity $realtimeActivity)
    {
        abort_if(Gate::denies('realtime_activity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.realtimeActivities.show', compact('realtimeActivity'));
    }

    public function destroy(RealtimeActivity $realtimeActivity)
    {
        abort_if(Gate::denies('realtime_activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realtimeActivity->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealtimeActivityRequest $request)
    {
        RealtimeActivity::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('realtime_activity_create') && Gate::denies('realtime_activity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RealtimeActivity();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
