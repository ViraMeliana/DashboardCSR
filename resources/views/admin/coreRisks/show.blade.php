@extends('layouts/contentLayoutMaster')

@section('title', 'Core Show')

@section('vendor-style')
    {{-- vendor css files --}}
@endsection

@section('page-style')
    {{-- Page Css files --}}
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
                                <th>Action</th>
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
                                        <button class="btn btn-primary" data-evidance-code="{{ $it['evidance_code'] }}">Quartals</button>
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

@endsection

@section('vendor-script')
    {{-- vendor files --}}
@endsection


@section('page-script')

@endsection
