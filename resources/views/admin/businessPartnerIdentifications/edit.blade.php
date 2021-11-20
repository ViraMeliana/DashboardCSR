@extends('layouts/contentLayoutMaster')

@section('title', 'Business Partner Identifications')

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
                        {{ trans('global.edit') }} {{ trans('cruds.businessPartnerIdentification.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.business-partner-identifications.update", [$businessPartnerIdentification->id]) }}" enctype="multipart/form-data">

                    @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required">{{ trans('cruds.businessPartnerIdentification.fields.risk_level') }}</label>
                                    <select class="form-control {{ $errors->has('risk_level') ? 'is-invalid' : '' }}" name="risk_level" id="risk_level" required>
                                        <option value disabled {{ old('risk_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Models\BusinessPartnerIdentification::RISK_LEVEL_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('risk_level', $businessPartnerIdentification->risk_level) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('risk_level'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('risk_level') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.businessPartnerIdentification.fields.risk_level_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="business_partner_id">{{ trans('cruds.businessPartnerIdentification.fields.business_partner') }}</label>
                                    <select class="form-control select2 {{ $errors->has('business_partner') ? 'is-invalid' : '' }}" name="business_partner_id" id="business_partner_id" required>
                                        @foreach($business_partners as $id => $entry)
                                            <option value="{{ $id }}" {{ (old('business_partner_id') ? old('business_partner_id') : $businessPartnerIdentification->business_partner->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('business_partner'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_partner') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.businessPartnerIdentification.fields.business_partner_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="business_partner_name">{{ trans('cruds.businessPartnerIdentification.fields.business_partner_name') }}</label>
                                    <input class="form-control {{ $errors->has('business_partner_name') ? 'is-invalid' : '' }}" type="text" name="business_partner_name" id="business_partner_name" value="{{ old('business_partner_name', $businessPartnerIdentification->business_partner_name) }}" required>
                                    @if($errors->has('business_partner_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('business_partner_name') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.businessPartnerIdentification.fields.business_partner_name_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="address">{{ trans('cruds.businessPartnerIdentification.fields.address') }}</label>
                                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address', $businessPartnerIdentification->address) }}</textarea>
                                    @if($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.businessPartnerIdentification.fields.address_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="activity">{{ trans('cruds.businessPartnerIdentification.fields.activity') }}</label>
                                    <input class="form-control {{ $errors->has('activity') ? 'is-invalid' : '' }}" type="text" name="activity" id="activity" value="{{ old('activity', $businessPartnerIdentification->activity) }}" required>
                                    @if($errors->has('activity'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('activity') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.businessPartnerIdentification.fields.activity_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="smap_implementation">{{ trans('cruds.businessPartnerIdentification.fields.smap_implementation') }}</label>
                                    <textarea class="form-control {{ $errors->has('smap_implementation') ? 'is-invalid' : '' }}" name="smap_implementation" id="smap_implementation" required>{{ old('smap_implementation', $businessPartnerIdentification->smap_implementation) }}</textarea>
                                    @if($errors->has('smap_implementation'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('smap_implementation') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.businessPartnerIdentification.fields.smap_implementation_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required">{{ trans('cruds.businessPartnerIdentification.fields.self_smap_control') }}</label>
                                    @foreach(App\Models\BusinessPartnerIdentification::SELF_SMAP_CONTROL_RADIO as $key => $label)
                                        <div class="form-check {{ $errors->has('self_smap_control') ? 'is-invalid' : '' }}">
                                            <input class="form-check-input" type="radio" id="self_smap_control_{{ $key }}" name="self_smap_control" value="{{ $key }}" {{ old('self_smap_control', $businessPartnerIdentification->self_smap_control) === (string) $key ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="self_smap_control_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                    @if($errors->has('self_smap_control'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('self_smap_control') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.businessPartnerIdentification.fields.self_smap_control_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="description">{{ trans('cruds.businessPartnerIdentification.fields.description') }}</label>
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $businessPartnerIdentification->description) }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.businessPartnerIdentification.fields.description_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="document_id">Document Number</label>
                                    <select class="form-control select2 {{ $errors->has('document_number') ? 'is-invalid' : '' }}" name="document_id" id="document_id" required>
                                        @foreach($business_documents as $id => $entry)
                                            <option value="{{ $id }}" {{ (old('document_id') ? old('document_id') : $businessPartnerIdentification->business_document->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
@endsection
