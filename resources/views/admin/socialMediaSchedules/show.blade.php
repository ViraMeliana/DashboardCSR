@extends('layouts/contentLayoutMaster')

@section('title', 'Social Media Schedules')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.socialMediaSchedules.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaSchedules.fields.id') }}
                        </th>
                        <td>
                            {{ $socialMediaSchedule->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaSchedules.fields.date') }}
                        </th>
                        <td>
                            {{ $socialMediaSchedule->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaSchedules.fields.event') }}
                        </th>
                        <td>
                            {{ $socialMediaSchedule->event }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaSchedules.fields.description') }}
                        </th>
                        <td>
                            {{ $socialMediaSchedule->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaSchedules.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\SocialMediaSchedule::TYPE_RADIO[$socialMediaSchedule->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaSchedules.fields.media') }}
                        </th>
                        <td>
                            @foreach($socialMediaSchedule->media as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaSchedules.fields.caption') }}
                        </th>
                        <td>
                            {{ $socialMediaSchedule->caption }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.social-media-schedules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>

@endsection
