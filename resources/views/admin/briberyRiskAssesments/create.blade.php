@extends('layouts/contentLayoutMaster')

@section('title', 'Bribery Risk Assessment')

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
                        {{ trans('global.create') }} {{ trans('cruds.briberyRiskAssesment.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.bribery-risk-assesments.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="atp_process_id">{{ trans('cruds.briberyRiskAssesment.fields.atp_process') }}</label>
                                    <select class="form-control select2 {{ $errors->has('atp_process') ? 'is-invalid' : '' }}" name="atp_process_id" id="atp_process_id" required>
                                        @foreach($atp_processes as $id => $entry)
                                            <option value="{{ $id }}" {{ old('atp_process_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('atp_process'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('atp_process') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.atp_process_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="requirements">{{ trans('cruds.briberyRiskAssesment.fields.requirements') }}</label>
                                    <textarea class="form-control {{ $errors->has('requirements') ? 'is-invalid' : '' }}" name="requirements" id="requirements" required>{{ old('requirements') }}</textarea>
                                    @if($errors->has('requirements'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('requirements') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.requirements_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="bribery_risk">{{ trans('cruds.briberyRiskAssesment.fields.bribery_risk') }}</label>
                                    <textarea class="form-control {{ $errors->has('bribery_risk') ? 'is-invalid' : '' }}" name="bribery_risk" id="bribery_risk" required>{{ old('bribery_risk') }}</textarea>
                                    @if($errors->has('bribery_risk'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('bribery_risk') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.bribery_risk_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="impact">{{ trans('cruds.briberyRiskAssesment.fields.impact') }}</label>
                                    <textarea class="form-control {{ $errors->has('impact') ? 'is-invalid' : '' }}" name="impact" id="impact" required>{{ old('impact') }}</textarea>
                                    @if($errors->has('impact'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('impact') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.impact_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="risk_causes">{{ trans('cruds.briberyRiskAssesment.fields.risk_causes') }}</label>
                                    <textarea class="form-control {{ $errors->has('risk_causes') ? 'is-invalid' : '' }}" name="risk_causes" id="risk_causes" required>{{ old('risk_causes') }}</textarea>
                                    @if($errors->has('risk_causes'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_causes') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.risk_causes_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="internal_control">{{ trans('cruds.briberyRiskAssesment.fields.internal_control') }}</label>
                                    <textarea class="form-control {{ $errors->has('internal_control') ? 'is-invalid' : '' }}" name="internal_control" id="internal_control" required>{{ old('internal_control') }}</textarea>
                                    @if($errors->has('internal_control'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('internal_control') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.internal_control_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="l">{{ trans('cruds.briberyRiskAssesment.fields.l') }}</label>
                                    <input class="form-control {{ $errors->has('l') ? 'is-invalid' : '' }}" type="number" name="l" id="l" value="{{ old('l', '') }}" step="1" required>
                                    @if($errors->has('l'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('l') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.l_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="c">{{ trans('cruds.briberyRiskAssesment.fields.c') }}</label>
                                    <input class="form-control {{ $errors->has('c') ? 'is-invalid' : '' }}" type="number" name="c" id="c" value="{{ old('c', '') }}" step="1" required>
                                    @if($errors->has('c'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('c') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.c_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="criteria_impact">{{ trans('cruds.briberyRiskAssesment.fields.criteria_impact') }}</label>
                                    <input class="form-control {{ $errors->has('criteria_impact') ? 'is-invalid' : '' }}" type="text" name="criteria_impact" id="criteria_impact" value="{{ old('criteria_impact', '') }}" required>
                                    @if($errors->has('criteria_impact'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('criteria_impact') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.criteria_impact_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required">{{ trans('cruds.briberyRiskAssesment.fields.risk_level') }}</label>
                                    <select class="form-control {{ $errors->has('risk_level') ? 'is-invalid' : '' }}" name="risk_level" id="risk_level" required>
                                        <option value disabled {{ old('risk_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Models\BriberyRiskAssesment::RISK_LEVEL_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('risk_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('risk_level'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_level') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.risk_level_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="proactive_mitigation">{{ trans('cruds.briberyRiskAssesment.fields.proactive_mitigation') }}</label>
                                    <textarea class="form-control {{ $errors->has('proactive_mitigation') ? 'is-invalid' : '' }}" name="proactive_mitigation" id="proactive_mitigation">{{ old('proactive_mitigation') }}</textarea>
                                    @if($errors->has('proactive_mitigation'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('proactive_mitigation') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.proactive_mitigation_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="l_target">{{ trans('cruds.briberyRiskAssesment.fields.l_target') }}</label>
                                    <input class="form-control {{ $errors->has('l_target') ? 'is-invalid' : '' }}" type="number" name="l_target" id="l_target" value="{{ old('l_target', '') }}" step="1" required>
                                    @if($errors->has('l_target'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('l_target') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.l_target_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="c_target">{{ trans('cruds.briberyRiskAssesment.fields.c_target') }}</label>
                                    <input class="form-control {{ $errors->has('c_target') ? 'is-invalid' : '' }}" type="number" name="c_target" id="c_target" value="{{ old('c_target', '') }}" step="1" required>
                                    @if($errors->has('c_target'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('c_target') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.c_target_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required">{{ trans('cruds.briberyRiskAssesment.fields.risk_level_target') }}</label>
                                    <select class="form-control {{ $errors->has('risk_level_target') ? 'is-invalid' : '' }}" name="risk_level_target" id="risk_level_target" required>
                                        <option value disabled {{ old('risk_level_target', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Models\BriberyRiskAssesment::RISK_LEVEL_TARGET_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('risk_level_target', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('risk_level_target'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_level_target') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.risk_level_target_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="opportunity">{{ trans('cruds.briberyRiskAssesment.fields.opportunity') }}</label>
                                    <textarea class="form-control {{ $errors->has('opportunity') ? 'is-invalid' : '' }}" name="opportunity" id="opportunity">{{ old('opportunity') }}</textarea>
                                    @if($errors->has('opportunity'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('opportunity') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.opportunity_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="description">{{ trans('cruds.briberyRiskAssesment.fields.description') }}</label>
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.description_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="personal_identification_id">{{ trans('cruds.briberyRiskAssesment.fields.personal_identification') }}</label>
                                    <select class="form-control select2 {{ $errors->has('personal_identification') ? 'is-invalid' : '' }}" name="personal_identification_id" id="personal_identification_id" required>
                                        @foreach($personal_identifications as $id => $entry)
                                            <option value="{{ $id }}" {{ old('personal_identification_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('personal_identification'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('personal_identification') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.personal_identification_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="document_id">Document Number</label>
                                    <select class="form-control select2 {{ $errors->has('document_id') ? 'is-invalid' : '' }}" name="document_id" id="document_id">
                                        @foreach($business_documents as $id => $entry)
                                            <option value="{{ $id }}" {{ old('document_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('document_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('document_id') }}
                                        </div>
                                    @endif
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
@endsection
