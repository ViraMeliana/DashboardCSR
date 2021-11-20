@extends('layouts/contentLayoutMaster')

@section('title', 'Document Management')

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
                        {{ trans('global.create') }} Business Partner Document
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.business-partner-documents.store") }}" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="type">Document Type</label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option disabled>Please select</option>
                                        <option value="business-partner">Business Partner</option>
                                        <option value="bribery-risk">Bribery Risk Assesment</option>
                                        <option value="rm3p">RM3P</option>
                                    </select>
                                    @if($errors->has('type'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('type') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="document_number">Document Number</label>
                                    <input class="form-control {{ $errors->has('document_number') ? 'is-invalid' : '' }}" type="text" name="document_number" id="document_number" value="{{ old('document_number', '') }}" required>
                                    @if($errors->has('document_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('document_number') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="note">Note</label>
                                    <input class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" type="text" name="note" id="note" value="{{ old('note', '') }}">
                                    @if($errors->has('note'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('note') }}
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
                                    <label for="revision">{{ trans('cruds.riskMitigationMonitoring.fields.revision') }}</label>
                                    <input class="form-control {{ $errors->has('revision') ? 'is-invalid' : '' }}" type="number" name="revision" id="revision" value="{{ old('revision', '0') }}" step="1">
                                    @if($errors->has('revision'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('revision') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.riskMitigationMonitoring.fields.revision_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label>Validate</label>
                                    <select class="form-control {{ $errors->has('validate') ? 'is-invalid' : '' }}" name="validate" id="validate">
                                        <option value disabled {{ old('validate', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Models\BusinessPartnerDocument::VALIDATE_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('validate', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('validate'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('validate') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="validate_date">Validate Date</label>
                                    <input class="form-control date {{ $errors->has('validate_date') ? 'is-invalid' : '' }}" type="text" name="validate_date" id="validate_date" value="{{ old('validate_date') }}">
                                    @if($errors->has('validate_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('validate_date') }}
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
    {{-- Page js files --}}
@endsection
