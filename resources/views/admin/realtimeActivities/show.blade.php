@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.realtimeActivity.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
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
                            {{ trans('cruds.realtimeActivity.fields.quantity') }}
                        </th>
                        <td>
                            {{ $realtimeActivity->quantity }}
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
                            {{ $realtimeActivity->location }}
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
                            {{ trans('cruds.realtimeActivity.fields.description') }}
                        </th>
                        <td>
                            {{ $realtimeActivity->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.photo') }}
                        </th>
                        <td>
                            @foreach($realtimeActivity->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('preview') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.realtime-activities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
