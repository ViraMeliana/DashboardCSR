@extends('layouts/contentLayoutMaster')

@section('title', 'Risk')

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
                        {{ trans('global.edit') }} {{ trans('cruds.risk.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.risks.update", [$risk->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="risk_name">{{ trans('cruds.risk.fields.risk_name') }}</label>
                                    <input class="form-control {{ $errors->has('risk_name') ? 'is-invalid' : '' }}" type="text" name="risk_name" id="risk_name" value="{{ old('risk_name', $risk->risk_name) }}" required>
                                    @if($errors->has('risk_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_name') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.risk_name_helper') }}</small></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="risk_process">{{ trans('cruds.risk.fields.risk_process') }}</label>
                                    <textarea class="form-control {{ $errors->has('risk_process') ? 'is-invalid' : '' }}" name="risk_process" id="risk_process" required>{{ old('risk_process', $risk->risk_process) }}</textarea>
                                    @if($errors->has('risk_process'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_process') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.risk_process_helper') }}</small></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="description">{{ trans('cruds.risk.fields.description') }}</label>
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $risk->description) }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.description_helper') }}</small></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="likelihood_baseline">{{ trans('cruds.risk.fields.likelihood_baseline') }}</label>
                                    <input class="form-control {{ $errors->has('likelihood_baseline') ? 'is-invalid' : '' }}" type="text" name="likelihood_baseline" id="likelihood_baseline" value="{{ old('likelihood_baseline', $risk->likelihood_baseline) }}" required>
                                    @if($errors->has('likelihood_baseline'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('likelihood_baseline') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.likelihood_baseline_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="consequences_baseline">{{ trans('cruds.risk.fields.consequences_baseline') }}</label>
                                    <input class="form-control {{ $errors->has('consequences_baseline') ? 'is-invalid' : '' }}" type="text" name="consequences_baseline" id="consequences_baseline" value="{{ old('consequences_baseline', $risk->consequences_baseline) }}" required>
                                    @if($errors->has('consequences_baseline'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('consequences_baseline') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.consequences_baseline_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="iso">{{ trans('cruds.risk.fields.iso') }}</label>
                                    <textarea class="form-control {{ $errors->has('iso') ? 'is-invalid' : '' }}" name="iso" id="iso" required>{{ old('iso', $risk->iso) }}</textarea>
                                    @if($errors->has('iso'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('iso') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.iso_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="existing_control">{{ trans('cruds.risk.fields.existing_control') }}</label>
                                    <textarea class="form-control {{ $errors->has('existing_control') ? 'is-invalid' : '' }}" name="existing_control" id="existing_control" required>{{ old('existing_control', $risk->existing_control) }}</textarea>
                                    @if($errors->has('existing_control'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('existing_control') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.existing_control_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required">{{ trans('cruds.risk.fields.effectiveness') }}</label>
                                    @foreach(App\Models\Risk::EFFECTIVENESS_RADIO as $key => $label)
                                        <div class="form-check {{ $errors->has('effectiveness') ? 'is-invalid' : '' }}">
                                            <input class="form-check-input" type="radio" id="effectiveness_{{ $key }}" name="effectiveness" value="{{ $key }}" {{ old('effectiveness', $risk->effectiveness) === (string) $key ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="effectiveness_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                    @if($errors->has('effectiveness'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('effectiveness') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.effectiveness_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="risk_cause">{{ trans('cruds.risk.fields.risk_cause') }}</label>
                                    <textarea class="form-control {{ $errors->has('risk_cause') ? 'is-invalid' : '' }}" name="risk_cause" id="risk_cause" required>{{ old('risk_cause', $risk->risk_cause) }}</textarea>
                                    @if($errors->has('risk_cause'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_cause') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.risk_cause_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="proactive_mitigation">{{ trans('cruds.risk.fields.proactive_mitigation') }}</label>
                                    <textarea class="form-control {{ $errors->has('proactive_mitigation') ? 'is-invalid' : '' }}" name="proactive_mitigation" id="proactive_mitigation" required>{{ old('proactive_mitigation', $risk->proactive_mitigation) }}</textarea>
                                    @if($errors->has('proactive_mitigation'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('proactive_mitigation') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.proactive_mitigation_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="likelihood_target">{{ trans('cruds.risk.fields.likelihood_target') }}</label>
                                    <input class="form-control {{ $errors->has('likelihood_target') ? 'is-invalid' : '' }}" type="text" name="likelihood_target" id="likelihood_target" value="{{ old('likelihood_target', $risk->likelihood_target) }}" required>
                                    @if($errors->has('likelihood_target'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('likelihood_target') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.likelihood_target_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="consequences_target">{{ trans('cruds.risk.fields.consequences_target') }}</label>
                                    <input class="form-control {{ $errors->has('consequences_target') ? 'is-invalid' : '' }}" type="text" name="consequences_target" id="consequences_target" value="{{ old('consequences_target', $risk->consequences_target) }}" required>
                                    @if($errors->has('consequences_target'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('consequences_target') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.consequences_target_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="impact">{{ trans('cruds.risk.fields.impact') }}</label>
                                    <textarea class="form-control {{ $errors->has('impact') ? 'is-invalid' : '' }}" name="impact" id="impact" required>{{ old('impact', $risk->impact) }}</textarea>
                                    @if($errors->has('impact'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('impact') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.impact_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="reactive_mitigation">{{ trans('cruds.risk.fields.reactive_mitigation') }}</label>
                                    <textarea class="form-control {{ $errors->has('reactive_mitigation') ? 'is-invalid' : '' }}" name="reactive_mitigation" id="reactive_mitigation">{{ old('reactive_mitigation', $risk->reactive_mitigation) }}</textarea>
                                    @if($errors->has('reactive_mitigation'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('reactive_mitigation') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.reactive_mitigation_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="time_schedule">{{ trans('cruds.risk.fields.time_schedule') }}</label>
                                    <input class="form-control {{ $errors->has('time_schedule') ? 'is-invalid' : '' }}" type="text" name="time_schedule" id="time_schedule" value="{{ old('time_schedule', $risk->time_schedule) }}" required>
                                    @if($errors->has('time_schedule'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('time_schedule') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.time_schedule_helper') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required">{{ trans('cruds.risk.fields.type') }}</label>
                                    @foreach(App\Models\Risk::TYPE_RADIO as $key => $label)
                                        <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                                            <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', $risk->type) === (string) $key ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                    @if($errors->has('type'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('type') }}
                                        </div>
                                    @endif
                                    <p><small class="text-muted">{{ trans('cruds.risk.fields.type_helper') }}</small></p>
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
    <script>
        $('.select2').select2();
    </script>
@endsection
