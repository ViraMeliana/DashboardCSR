@extends('layouts/contentLayoutMaster')

@section('title', 'Core Show')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.coreRisk.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-primary mb-2" href="{{ route('admin.core-risks.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Subject</th>
                                <th>Sebab</th>
                                <th>Dampak</th>
                                <th>Pro/Re</th>
                                <th>Mitigation</th>
                                <th>Code</th>
                                <th>Evidance</th>
                                <th>Quartal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($toShow as $index => $item)
                            @foreach($item as $in => $it)
                                <tr>
                                    <td>
                                        {{ $it['no'] }}
                                    </td>
                                    <td>
                                        {{ $it['risiko'] }}
                                    </td>
                                    <td>
                                        {{ $it['risiko_cause'] }}
                                    </td>
                                    <td>
                                        {{ $it['risiko_impact'] }}
                                    </td>
                                    <td>
                                        {{ $it['mitigation_category'] }}
                                    </td>
                                    <td>
                                        {{ $it['mitigation'] }}
                                    </td>
                                    <td>
                                        {{ $it['evidance_code'] }}
                                    </td>
                                    <td>
                                        {{ $it['evidance'] }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary mb-1 edit-button" data-evidance="{{ $it['evidance_id'] }}">
                                            <i data-feather="settings"></i>
                                        </a>

                                        <a class="btn btn-outline-primary mb-1 show-button" data-evidance="{{ $it['evidance_id'] }}">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <a class="btn btn-primary mt-2" href="{{ route('admin.core-risks.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.coreRisks.modal.quartal')
    @include('admin.coreRisks.modal.quartalShow')

@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection


@section('page-script')
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
    <script>
        $(function () {
            $('.edit-button').on('click', function () {
                let editModal = $('#editModal');

                editModal.find('#evidance_id').val($(this).data('evidance'));
                editModal.modal('show')
            });

            $('.show-button').on('click', function () {
                let showModal = $('#showModal');

                $.post('{{ route('admin.core-risks.showQuartal') }}', {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    evidance_id: $(this).data('evidance')
                }, function (data, status) {
                    if(status) {
                        $('.table-quartal-show tbody').html(data.data);
                        showModal.modal('show')
                    }
                })
            });
        })
    </script>
@endsection
