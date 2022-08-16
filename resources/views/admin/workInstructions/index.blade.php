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
        @can('work_instruction_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-primary" href="{{ route('admin.work-instructions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.workInstruction.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">{{ trans('cruds.workInstruction.title_singular') }} {{ trans('global.list') }} </h4>
                    </div>
                    <div class="card-datatable">
                        <table class="datatables-ajax table datatable-Role">
                            <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.workInstruction.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.workInstruction.fields.no_urut') }}
                                </th>
                                <th>
                                    {{ trans('cruds.workInstruction.fields.no_ik') }}
                                </th>
                                <th>
                                    {{ trans('cruds.workInstruction.fields.work_unit') }}
                                </th>
                                <th>
                                    {{ trans('cruds.workInstruction.fields.publish_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.workInstruction.fields.reassessment_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.workInstruction.fields.check_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.workInstruction.fields.tindakan') }}
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
                ajax: "{{ route('admin.work-instructions.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'no_urut', name: 'no_urut' },
                    { data: 'no_ik', name: 'no_ik' },
                    { data: 'work_unit', name: 'work_unit' },
                    { data: 'publish_date', name: 'publish_date' },
                    { data: 'reassessment_date', name: 'reassessment_date' },
                    { data: 'check_date', name: 'check_date' },
                    { data: 'tindakan', name: 'tindakan' },
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

