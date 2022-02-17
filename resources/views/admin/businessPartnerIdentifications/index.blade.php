@extends('layouts/contentLayoutMaster')

@section('title', 'Business Partner Identifications')

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
        @can('business_partner_identification_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-primary" href="{{ route('admin.business-partner-identifications.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.businessPartnerIdentification.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">{{ trans('cruds.businessPartnerIdentification.title_singular') }} {{ trans('global.list') }} </h4>
                    </div>
                    <div class="card-datatable">
                        <table class="table datatable ajaxTable datatable-BusinessPartnerIdentification">
                            <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.businessPartnerIdentification.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.businessPartnerIdentification.fields.risk_level') }}
                                </th>
                                <th>
                                    {{ trans('cruds.businessPartnerIdentification.fields.business_partner') }}
                                </th>
                                <th>
                                    {{ trans('cruds.businessPartnerIdentification.fields.business_partner_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.businessPartnerIdentification.fields.activity') }}
                                </th>
                                <th>
                                    {{ trans('cruds.businessPartnerIdentification.fields.smap_implementation') }}
                                </th>
                                <th>
                                    {{ trans('cruds.businessPartnerIdentification.fields.self_smap_control') }}
                                </th>
                                <th>
                                    Document Number
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('business_partner_identification_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.business-partner-identifications.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
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

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.business-partner-identifications.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'risk_level', name: 'risk_level' },
                    { data: 'business_partner_name', name: 'business_partner.name' },
                    { data: 'business_partner_name', name: 'business_partner_name' },
                    { data: 'activity', name: 'activity' },
                    { data: 'smap_implementation', name: 'smap_implementation' },
                    { data: 'self_smap_control', name: 'self_smap_control' },
                    { data: 'document_number', name: 'business_document.document_number' },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 10,
            };
            let table = $('.datatable-BusinessPartnerIdentification').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection
