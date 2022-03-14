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
                <table class="table table-bordered table-striped">
                    <tbody>
{{--                    @dd($toShow)--}}
                        @foreach($toShow as $index => $item)
                            @foreach($item as $in => $it)
                                <tr>
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
                                </tr>
                            @endforeach

                        @endforeach
                    </tbody>
                </table>
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
