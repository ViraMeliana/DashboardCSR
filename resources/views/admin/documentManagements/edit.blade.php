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
                        {{ trans('global.edit') }} Business Partner Document
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.business-partner-documents.update", [$businessPartnerDocument->id]) }}" enctype="multipart/form-data">

                    @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="type">Document Type</label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option disabled>Please select</option>
                                        <option value="business-partner" @if($businessPartnerDocument->type == 'business-partner') selected @endif>Business Partner</option>
                                        <option value="bribery-risk" @if($businessPartnerDocument->type == 'bribery-risk') selected @endif>Bribery Risk Assesment</option>
                                        <option value="rm3p" @if($businessPartnerDocument->type == 'rm3p') selected @endif>RM3P</option>
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
                                    <input class="form-control {{ $errors->has('document_number') ? 'is-invalid' : '' }}" type="text" name="document_number" id="document_number" value="{{ old('document_number', $businessPartnerDocument->document_number) }}" required>
                                    @if($errors->has('document_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('document_number') }}
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
