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
                        {{ trans('global.edit') }} {{ trans('cruds.briberyRiskAssesment.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.bribery-risk-assesments.update", [$briberyRiskAssesment->id]) }}" enctype="multipart/form-data">

                    @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="atp_process_id">{{ trans('cruds.briberyRiskAssesment.fields.atp_process') }}</label>
                                    <select class="form-control select2 {{ $errors->has('atp_process') ? 'is-invalid' : '' }}" name="atp_process_id" id="atp_process_id" required>
                                        @foreach($atp_processes as $id => $entry)
                                            <option value="{{ $id }}" {{ (old('atp_process_id') ? old('atp_process_id') : $briberyRiskAssesment->atp_process->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                                    <textarea class="form-control {{ $errors->has('requirements') ? 'is-invalid' : '' }}" name="requirements" id="requirements" required>{{ old('requirements', $briberyRiskAssesment->requirements) }}</textarea>
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
                                    <textarea class="form-control {{ $errors->has('bribery_risk') ? 'is-invalid' : '' }}" name="bribery_risk" id="bribery_risk" required>{{ old('bribery_risk', $briberyRiskAssesment->bribery_risk) }}</textarea>
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
                                    <textarea class="form-control {{ $errors->has('impact') ? 'is-invalid' : '' }}" name="impact" id="impact" required>{{ old('impact', $briberyRiskAssesment->impact) }}</textarea>
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
                                    <textarea class="form-control {{ $errors->has('risk_causes') ? 'is-invalid' : '' }}" name="risk_causes" id="risk_causes" required>{{ old('risk_causes', $briberyRiskAssesment->risk_causes) }}</textarea>
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
                                    <textarea class="form-control {{ $errors->has('internal_control') ? 'is-invalid' : '' }}" name="internal_control" id="internal_control" required>{{ old('internal_control', $briberyRiskAssesment->internal_control) }}</textarea>
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
                                    <input class="form-control {{ $errors->has('l') ? 'is-invalid' : '' }}" type="number" name="l" id="l" value="{{ old('l', $briberyRiskAssesment->l) }}" step="1" required>
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
                                    <input class="form-control {{ $errors->has('c') ? 'is-invalid' : '' }}" type="number" name="c" id="c" value="{{ old('c', $briberyRiskAssesment->c) }}" step="1" required>
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
                                    <input class="form-control {{ $errors->has('criteria_impact') ? 'is-invalid' : '' }}" type="text" name="criteria_impact" id="criteria_impact" value="{{ old('criteria_impact', $briberyRiskAssesment->criteria_impact) }}" required>
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
                                            <option value="{{ $key }}" {{ old('risk_level', $briberyRiskAssesment->risk_level) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                                    <textarea class="form-control {{ $errors->has('proactive_mitigation') ? 'is-invalid' : '' }}" name="proactive_mitigation" id="proactive_mitigation">{{ old('proactive_mitigation', $briberyRiskAssesment->proactive_mitigation) }}</textarea>
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
                                    <input class="form-control {{ $errors->has('l_target') ? 'is-invalid' : '' }}" type="number" name="l_target" id="l_target" value="{{ old('l_target', $briberyRiskAssesment->l_target) }}" step="1" required>
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
                                    <input class="form-control {{ $errors->has('c_target') ? 'is-invalid' : '' }}" type="number" name="c_target" id="c_target" value="{{ old('c_target', $briberyRiskAssesment->c_target) }}" step="1" required>
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
                                            <option value="{{ $key }}" {{ old('risk_level_target', $briberyRiskAssesment->risk_level_target) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                                    <textarea class="form-control {{ $errors->has('opportunity') ? 'is-invalid' : '' }}" name="opportunity" id="opportunity">{{ old('opportunity', $briberyRiskAssesment->opportunity) }}</textarea>
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
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $briberyRiskAssesment->description) }}</textarea>
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
                                            <option value="{{ $id }}" {{ (old('personal_identification_id') ? old('personal_identification_id') : $briberyRiskAssesment->personal_identification->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                                    <label for="reviewed_signature">{{ trans('cruds.briberyRiskAssesment.fields.reviewed_signature') }}</label>
                                    <div class="needsclick dropzone {{ $errors->has('reviewed_signature') ? 'is-invalid' : '' }}" id="reviewed_signature-dropzone">
                                    </div>
                                    @if($errors->has('reviewed_signature'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('reviewed_signature') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.reviewed_signature_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="approved_signature">{{ trans('cruds.briberyRiskAssesment.fields.approved_signature') }}</label>
                                    <div class="needsclick dropzone {{ $errors->has('approved_signature') ? 'is-invalid' : '' }}" id="approved_signature-dropzone">
                                    </div>
                                    @if($errors->has('approved_signature'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('approved_signature') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.briberyRiskAssesment.fields.approved_signature_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="document_id">Document Number</label>
                                    <select class="form-control select2 {{ $errors->has('document_number') ? 'is-invalid' : '' }}" name="document_id" id="document_id">
                                        @foreach($business_documents as $id => $entry)
                                            <option value="{{ $id }}" {{ (old('document_id') ? old('document_id') : $briberyRiskAssesment->business_document->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('document_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_partner') }}
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
    <script>
        Dropzone.options.reviewedSignatureDropzone = {
            url: '{{ route('admin.bribery-risk-assesments.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="reviewed_signature"]').remove()
                $('form').append('<input type="hidden" name="reviewed_signature" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="reviewed_signature"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($briberyRiskAssesment) && $briberyRiskAssesment->reviewed_signature)
                var file = {!! json_encode($briberyRiskAssesment->reviewed_signature) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="reviewed_signature" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.approvedSignatureDropzone = {
            url: '{{ route('admin.bribery-risk-assesments.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="approved_signature"]').remove()
                $('form').append('<input type="hidden" name="approved_signature" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="approved_signature"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($briberyRiskAssesment) && $briberyRiskAssesment->approved_signature)
                var file = {!! json_encode($briberyRiskAssesment->approved_signature) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="approved_signature" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
