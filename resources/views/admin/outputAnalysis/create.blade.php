@extends('layouts/contentLayoutMaster')

@section('title', 'Output Analysis')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">

@endsection

@section('page-style')
    {{-- Page Css files --}}
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ trans('global.create') }} {{ trans('cruds.outputAnalysi.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.output-analysis.store") }}" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="output">{{ trans('cruds.outputAnalysi.fields.output') }}</label>
                                    <input class="form-control {{ $errors->has('output') ? 'is-invalid' : '' }}" type="text" name="output" id="output" value="{{ old('output', '') }}" required>
                                    @if($errors->has('output'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('output') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.outputAnalysi.fields.output_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="analysis_process_id">{{ trans('cruds.outputAnalysi.fields.analysis_process') }}</label>
                                    <select class="form-control select2 {{ $errors->has('analysis_process') ? 'is-invalid' : '' }}" name="analysis_process_id" id="analysis_process_id">
                                        @foreach($analysis_processes as $id => $entry)
                                            <option value="{{ $id }}" {{ old('analysis_process_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('analysis_process'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('analysis_process') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.outputAnalysi.fields.analysis_process_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect waves-float waves-light" type="submit">Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

@endsection

@section('page-script')
    {{-- Page js files --}}
@endsection
