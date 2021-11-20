@extends('layouts/contentLayoutMaster')

@section('title', 'Business Partner')

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
                        {{ trans('global.edit') }} {{ trans('cruds.goalMeasurement.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.goal-measurements.update", [$goalMeasurement->id]) }}" enctype="multipart/form-data">

                    @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="kpi">{{ trans('cruds.goalMeasurement.fields.kpi') }}</label>
                                    <input class="form-control {{ $errors->has('kpi') ? 'is-invalid' : '' }}" type="text" name="kpi" id="kpi" value="{{ old('kpi', $goalMeasurement->kpi) }}" required>
                                    @if($errors->has('kpi'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('kpi') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.goalMeasurement.fields.kpi_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="target">{{ trans('cruds.goalMeasurement.fields.target') }}</label>
                                    <input class="form-control {{ $errors->has('target') ? 'is-invalid' : '' }}" type="number" name="target" id="target" value="{{ old('target', $goalMeasurement->target) }}" step="1">
                                    @if($errors->has('target'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('target') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.goalMeasurement.fields.target_helper') }}</small>
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
