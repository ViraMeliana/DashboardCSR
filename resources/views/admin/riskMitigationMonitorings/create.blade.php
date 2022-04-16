@extends('layouts/contentLayoutMaster')

@section('title', 'Risk Mitigation Monitorings')

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
                        {{ trans('global.create') }} {{ trans('cruds.riskMitigationMonitoring.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.risk-mitigation-monitorings.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="document_id">Document Number</label>
                                    <select class="form-control select2 {{ $errors->has('document_id') ? 'is-invalid' : '' }}" name="document_id" id="document_id" required>
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
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="target">{{ trans('cruds.riskMitigationMonitoring.fields.target') }}</label>
                                    <input class="form-control {{ $errors->has('target') ? 'is-invalid' : '' }}" type="text" name="target" id="target" value="{{ old('target', '') }}" required>
                                    @if($errors->has('target'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('target') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.target_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="goal">{{ trans('cruds.riskMitigationMonitoring.fields.goal') }}</label>
                                    <input class="form-control {{ $errors->has('goal') ? 'is-invalid' : '' }}" type="text" name="goal" id="goal" value="{{ old('goal', '') }}" required>
                                    @if($errors->has('goal'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('goal') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.goal_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="proactive_mitigation">{{ trans('cruds.riskMitigationMonitoring.fields.proactive_mitigation') }}</label>
                                    <input class="form-control {{ $errors->has('proactive_mitigation') ? 'is-invalid' : '' }}" type="text" name="proactive_mitigation" id="proactive_mitigation" value="{{ old('proactive_mitigation', '') }}" required>
                                    @if($errors->has('proactive_mitigation'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('proactive_mitigation') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.proactive_mitigation_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="plan_date">{{ trans('cruds.riskMitigationMonitoring.fields.plan_date') }}</label>
                                    <input class="form-control  {{ $errors->has('plan_date') ? 'is-invalid' : '' }}" type="date" name="plan_date" id="plan_date" value="{{ old('plan_date') }}">
                                    @if($errors->has('plan_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('plan_date') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.plan_date_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="realization_date">{{ trans('cruds.riskMitigationMonitoring.fields.realization_date') }}</label>
                                    <input class="form-control {{ $errors->has('realization_date') ? 'is-invalid' : '' }}" type="date" name="realization_date" id="realization_date" value="{{ old('realization_date') }}">
                                    @if($errors->has('realization_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('realization_date') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.realization_date_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="l">{{ trans('cruds.riskMitigationMonitoring.fields.l') }}</label>
                                    <input class="form-control {{ $errors->has('l') ? 'is-invalid' : '' }}" type="number" name="l" id="l" value="{{ old('l', '') }}" step="1">
                                    @if($errors->has('l'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('l') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.l_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="c">{{ trans('cruds.riskMitigationMonitoring.fields.c') }}</label>
                                    <input class="form-control {{ $errors->has('c') ? 'is-invalid' : '' }}" type="number" name="c" id="c" value="{{ old('c', '') }}" step="1">
                                    @if($errors->has('c'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('c') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.c_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label>{{ trans('cruds.riskMitigationMonitoring.fields.risk_level') }}</label>
                                    <select class="form-control {{ $errors->has('risk_level') ? 'is-invalid' : '' }}" name="risk_level" id="risk_level">
                                        <option value disabled {{ old('risk_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Models\RiskMitigationMonitoring::RISK_LEVEL_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('risk_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('risk_level'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_level') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.risk_level_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="l_after">{{ trans('cruds.riskMitigationMonitoring.fields.l_after') }}</label>
                                    <input class="form-control {{ $errors->has('l_after') ? 'is-invalid' : '' }}" type="number" name="l_after" id="l_after" value="{{ old('l_after', '') }}" step="1">
                                    @if($errors->has('l_after'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('l_after') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.l_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="c_after">{{ trans('cruds.riskMitigationMonitoring.fields.c_after') }}</label>
                                    <input class="form-control {{ $errors->has('c_after') ? 'is-invalid' : '' }}" type="number" name="c_after" id="c_after" value="{{ old('c_after', '') }}" step="1">
                                    @if($errors->has('c_after'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('c_after') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.c_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label>{{ trans('cruds.riskMitigationMonitoring.fields.risk_level_after') }}</label>
                                    <select class="form-control {{ $errors->has('risk_level_after') ? 'is-invalid' : '' }}" name="risk_level_after" id="risk_level_after">
                                        <option value disabled {{ old('risk_level_after', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Models\RiskMitigationMonitoring::RISK_LEVEL_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('risk_level_after', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('risk_level_after'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_level_after') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.risk_level_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="responsible_id">{{ trans('cruds.riskMitigationMonitoring.fields.responsible') }}</label>
                                    <select class="form-control select2 {{ $errors->has('responsible') ? 'is-invalid' : '' }}" name="responsible_id" id="responsible_id" required>
                                        @foreach($responsibles as $id => $entry)
                                            <option value="{{ $id }}" {{ old('responsible_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('responsible'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('responsible') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.responsible_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required">{{ trans('cruds.riskMitigationMonitoring.fields.status') }}</label>
                                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Models\RiskMitigationMonitoring::STATUS_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('status'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('status') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.status_helper') }}</small>
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
