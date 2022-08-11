@extends('layouts/contentLayoutMaster')

@section('title', 'Realtime Activity')

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
    <div class="blog-list-wrapper">
        <!-- Blog List Items -->
        <div class="row match-height">
            @can('realtime_activity_create')
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <button type="button"
                                    class="btn btn-icon btn-icon btn-flat-primary waves-effect h-100 w-100 btn-create-event">
                                <i data-feather="plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endcan

            @foreach($realtimeActivities as $key => $realtimeActivity)
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="javascript:void(0);">
                                @if(count($realtimeActivity->photo) > 0)

                                    <div id="carousel{{$realtimeActivity->id}}Indicators" class="carousel slide"
                                         data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            @php
                                                $count_cover = 0;
                                            @endphp

                                            @foreach($realtimeActivity->photo as $photo)
                                                <button type="button" data-bs-target="#carousel{{$realtimeActivity->id}}Indicators"
                                                        data-bs-slide-to="{{$count_cover}}"
                                                        class="{{$count_cover == 0 ? 'active' : ''}}"
                                                        aria-current="true"
                                                        aria-label="Slide {{$count_cover}}">
                                                </button>

                                                @php
                                                    $count_cover += 1;
                                                @endphp
                                            @endforeach

                                            @php
                                                $count_cover = 0;
                                            @endphp
                                        </div>

                                        <div class="carousel-inner">
                                            @foreach($realtimeActivity->photo as $key => $media)
                                                <div class="carousel-item {{$count_cover == 0 ? 'active' : ''}}">
                                                    <img src="{{ $media->getUrl('preview') }}" class="d-block w-100"
                                                         alt="{{ $media->getUrl('preview') }}"/>
                                                </div>
                                                @php
                                                    $count_cover += 1;
                                                @endphp
                                            @endforeach
                                        </div>

                                        <button
                                            class="carousel-control-prev"
                                            type="button"
                                            data-bs-target="#carousel{{$realtimeActivity->id}}Indicators"
                                            data-bs-slide="prev"
                                        >
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>

                                        <button
                                            class="carousel-control-next"
                                            type="button"
                                            data-bs-target="#carousel{{$realtimeActivity->id}}Indicators"
                                            data-bs-slide="next">

                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img class="card-img-top img-fluid"
                                         src="{{ asset('images/pages/dummy.jpg') }}"
                                         alt="Blog Post pic"/>
                                @endif
                            </a>

                            <h4 class="card-title">
                                <a href="javascript:void(0);" class="blog-title-truncate text-body-heading">
                                    {{ ucwords(strtolower($realtimeActivity->title)) }}
                                </a>
                            </h4>

                            <p class="card-text blog-content-truncate">
                                {{ substr($realtimeActivity->description, 0, 70) }} ...
                            </p>

                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                @can('realtime_activity_edit')
                                    <a class="btn btn-outline-primary btn-sm waves-effect waves-float waves-light"
                                       href="{{ route('admin.realtime-activities.edit', $realtimeActivity->id) }}">
                                        Edit
                                    </a>
                                @endcan
                                @can('realtime_activity_delete')
                                    <a class="btn btn-outline-danger btn-sm waves-effect waves-float waves-light delete-btn"
                                       href="javascript:void(0);">
                                        Delete
                                    </a>
                                @endcan
                                @can('realtime_activity_show')
                                    <a class="btn btn-primary btn-sm waves-effect waves-float waves-light"
                                       href="{{ route('admin.realtime-activities.show', $realtimeActivity->id) }}">
                                        Show
                                    </a>
                                @endcan
                            </div>

                            <form action="{{ route('admin.realtime-activities.destroy', $realtimeActivity->id) }}" method="POST"
                                  class="delete-form">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--/ Blog List Items -->
    </div>

    {{ $realtimeActivities->links('vendor.pagination.custom') }}

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
    @parent
    <script>
        $(function () {
            $('.btn-create-event').on('click', function () {
                window.location.href = '{{ route('admin.realtime-activities.create') }}'
            })

            $('.delete-btn').on('click', function () {
                let current_form = $(this).parent().parent().find('form');

                if (current_form) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            current_form.submit();
                        }
                    })
                }
            })
        })
    </script>
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
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
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
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                order: [[1, 'desc']],
                pageLength: 10,
            });
            let table = $('.datatable-RealtimeActivity:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
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
            table.on('column-visibility.dt', function (e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function (colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
        })

    </script>
@endsection
