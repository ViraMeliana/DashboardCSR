@extends('layouts/contentLayoutMaster')

@section('title', 'Social Media Schedules')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection

@section('content')
    <!-- Ajax Sourced Server-side -->
    <section id="ajax-datatable">
        @can('social_media_schedule_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-primary" href="{{ route('admin.social-media-schedules.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.socialMediaSchedules.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">{{ trans('cruds.socialMediaSchedules.title_singular') }} {{ trans('global.list') }}
                        </h4>
                    </div>
                    <div class="card-datatable">
                        <table class="datatables-ajax table table-responsive datatable-SocialMediaSchedule">
                            <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.socialMediaSchedules.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.socialMediaSchedules.fields.date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.socialMediaSchedules.fields.event') }}
                                </th>
                                <th>
                                    {{ trans('cruds.socialMediaSchedules.fields.description') }}
                                </th>
                                <th>
                                    {{ trans('cruds.socialMediaSchedules.fields.type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.socialMediaSchedules.fields.media') }}
                                </th>
                                <th>
                                    {{ trans('cruds.socialMediaSchedules.fields.caption') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($socialMediaSchedules as $key => $socialMediaSchedule)
                                <tr data-entry-id="{{ $socialMediaSchedule->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $socialMediaSchedule->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $socialMediaSchedule->date ?? '' }}
                                    </td>
                                    <td>
                                        {{ $socialMediaSchedule->event ?? '' }}
                                    </td>
                                    <td>
                                        {{ $socialMediaSchedule->description ?? '' }}
                                    </td>
                                    <td>
                                        {{ App\Models\SocialMediaSchedule::TYPE_RADIO[$socialMediaSchedule->type] ?? '' }}
                                    </td>
                                    <td>
                                        @foreach($socialMediaSchedule->media as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $socialMediaSchedule->caption ?? '' }}
                                    </td>
                                    <td>
                                        @can('social_media_schedule_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.social-media-schedules.show', $socialMediaSchedule->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan

                                        @can('social_media_schedule_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.social-media-schedules.edit', $socialMediaSchedule->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan

                                        @can('social_media_schedule_delete')
                                            <form action="{{ route('admin.social-media-schedules.destroy', $socialMediaSchedule->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Ajax Sourced Server-side -->

@endsection


@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('social_media_schedule_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.social-media-schedules.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 10,
            });
            let table = $('.datatable-SocialMediaSchedule:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>

@endsection

