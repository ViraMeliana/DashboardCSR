@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.realtimeActivity.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.realtime-activities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.id') }}
                        </th>
                        <td>
                            {{ $realtimeActivity->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.title') }}
                        </th>
                        <td>
                            {{ $realtimeActivity->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.date') }}
                        </th>
                        <td>
                            {{ $realtimeActivity->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\RealtimeActivity::TYPE_SELECT[$realtimeActivity->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.total') }}
                        </th>
                        <td>
                            {{ $realtimeActivity->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.location') }}
                        </th>
                        <td>
                            {{ App\Models\RealtimeActivity::LOCATION_SELECT[$realtimeActivity->location] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.village') }}
                        </th>
                        <td>
                            {{ App\Models\RealtimeActivity::VILLAGE_SELECT[$realtimeActivity->village] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.subdistrict') }}
                        </th>
                        <td>
                            {{ App\Models\RealtimeActivity::SUBDISTRICT_SELECT[$realtimeActivity->subdistrict] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.district') }}
                        </th>
                        <td>
                            {{ App\Models\RealtimeActivity::DISTRICT_SELECT[$realtimeActivity->district] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.province') }}
                        </th>
                        <td>
                            {{ App\Models\RealtimeActivity::PROVINCE_SELECT[$realtimeActivity->province] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.receiver') }}
                        </th>
                        <td>
                            {{ $realtimeActivity->receiver }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.number_of_beneficiaries') }}
                        </th>
                        <td>
                            {{ $realtimeActivity->number_of_beneficiaries }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.photo') }}
                        </th>
                        <td>
                            @foreach($realtimeActivity->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.realtime-activities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection