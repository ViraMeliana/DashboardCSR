@extends('layouts/contentLayoutMaster')

@section('title', 'TJSL Insidentils')

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
        @can('tjsl_insidentil_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-primary" href="{{ route('admin.tjsl-insidentils.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.tjslInsidentil.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">{{ trans('cruds.tjslInsidentil.title_singular') }} {{ trans('global.list') }} </h4>
                    </div>
                    <div class="card-datatable">
                        <table class="datatables-ajax table datatable-Role">
                            <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.tjslInsidentil.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tjslInsidentil.fields.periode') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tjslInsidentil.fields.rka') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tjslInsidentil.fields.cash_out') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tjslInsidentil.fields.commited') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tjslInsidentil.fields.realization') }}
                                </th>
                                <th>
                                    {{ trans('cruds.tjslInsidentil.fields.category') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            </thead>

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
            let dtOverrideGlobals = {
                processing: true,
                serverSide: true,
                retrieve: true,
                dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                aaSorting: [],
                ajax: "{{ route('admin.tjsl-insidentils.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'periode', name: 'periode' },
                    { data: 'rka', name: 'rka' },
                    { data: 'cash_out', name: 'cash_out' },
                    { data: 'commited', name: 'commited' },
                    { data: 'realization', name: 'realization' },
                    { data: 'category', name: 'category' },
                    {data: 'actions', orderable: false}
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 10,
            };
            let table = $('.datatable-Role').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection

