<?php

namespace App\Http\Controllers\Landing;

use App\Http\Requests\StoreRealtimeActivityRequest;
use App\Models\RealtimeActivity;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeController
{
    public function index()
    {
        return view('landing.index');
    }
    public function about()
    {
        return view('landing.about');
    }
    public function createActivity()
    {
        return view('landing.createActivity');
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

        return redirect()->route('landing.activity');
    }
    public function activity()
    {
        $realtimeActivities = RealtimeActivity::with(['media'])->get();

        return view('landing.activity', compact('realtimeActivities'));
    }
}
