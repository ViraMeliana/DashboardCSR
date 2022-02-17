<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRealtimeActivityRequest;
use App\Http\Requests\UpdateRealtimeActivityRequest;
use App\Http\Resources\Admin\RealtimeActivityResource;
use App\Models\RealtimeActivity;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RealtimeActivityApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('realtime_activity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RealtimeActivityResource(RealtimeActivity::all());
    }

    public function store(StoreRealtimeActivityRequest $request)
    {
        $realtimeActivity = RealtimeActivity::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $realtimeActivity->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        return (new RealtimeActivityResource($realtimeActivity))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RealtimeActivity $realtimeActivity)
    {
        abort_if(Gate::denies('realtime_activity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RealtimeActivityResource($realtimeActivity);
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

        return (new RealtimeActivityResource($realtimeActivity))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RealtimeActivity $realtimeActivity)
    {
        abort_if(Gate::denies('realtime_activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realtimeActivity->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
