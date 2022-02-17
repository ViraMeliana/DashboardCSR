@extends('layouts.admin')
@section('content')
@can('realtime_activity_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.realtime-activities.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.realtimeActivity.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.realtimeActivity.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RealtimeActivity">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.village') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.subdistrict') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.district') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.province') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.receiver') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.number_of_beneficiaries') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtimeActivity.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\RealtimeActivity::TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\RealtimeActivity::LOCATION_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\RealtimeActivity::VILLAGE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\RealtimeActivity::SUBDISTRICT_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\RealtimeActivity::DISTRICT_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\RealtimeActivity::PROVINCE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($realtimeActivities as $key => $realtimeActivity)
                        <tr data-entry-id="{{ $realtimeActivity->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $realtimeActivity->id ?? '' }}
                            </td>
                            <td>
                                {{ $realtimeActivity->title ?? '' }}
                            </td>
                            <td>
                                {{ $realtimeActivity->date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealtimeActivity::TYPE_SELECT[$realtimeActivity->type] ?? '' }}
                            </td>
                            <td>
                                {{ $realtimeActivity->total ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealtimeActivity::LOCATION_SELECT[$realtimeActivity->location] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealtimeActivity::VILLAGE_SELECT[$realtimeActivity->village] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealtimeActivity::SUBDISTRICT_SELECT[$realtimeActivity->subdistrict] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealtimeActivity::DISTRICT_SELECT[$realtimeActivity->district] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealtimeActivity::PROVINCE_SELECT[$realtimeActivity->province] ?? '' }}
                            </td>
                            <td>
                                {{ $realtimeActivity->receiver ?? '' }}
                            </td>
                            <td>
                                {{ $realtimeActivity->number_of_beneficiaries ?? '' }}
                            </td>
                            <td>
                                @foreach($realtimeActivity->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('realtime_activity_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.realtime-activities.show', $realtimeActivity->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('realtime_activity_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.realtime-activities.edit', $realtimeActivity->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('realtime_activity_delete')
                                    <form action="{{ route('admin.realtime-activities.destroy', $realtimeActivity->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('realtime_activity_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.realtime-activities.massDestroy') }}",
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
  let table = $('.datatable-RealtimeActivity:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection