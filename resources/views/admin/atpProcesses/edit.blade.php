@extends('layouts/contentLayoutMaster')

@section('title', 'ATP Process')

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
                        {{ trans('global.edit') }} {{ trans('cruds.atpProcess.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.atp-processes.update", [$atpProcess->id]) }}" enctype="multipart/form-data">

                    @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="activity">{{ trans('cruds.atpProcess.fields.activity') }}</label>
                                    <input class="form-control {{ $errors->has('activity') ? 'is-invalid' : '' }}" type="text" name="activity" id="activity" value="{{ old('activity', $atpProcess->activity) }}" required>
                                    @if($errors->has('activity'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('activity') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.atpProcess.fields.activity_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="description">{{ trans('cruds.atpProcess.fields.description') }}</label>
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $atpProcess->description) }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.atpProcess.fields.description_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="transaction">{{ trans('cruds.atpProcess.fields.transaction') }}</label>
                                    <input class="form-control {{ $errors->has('transaction') ? 'is-invalid' : '' }}" type="text" name="transaction" id="transaction" value="{{ old('transaction', $atpProcess->transaction) }}">
                                    @if($errors->has('transaction'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('transaction') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.atpProcess.fields.transaction_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="project">{{ trans('cruds.atpProcess.fields.project') }}</label>
                                    <input class="form-control {{ $errors->has('project') ? 'is-invalid' : '' }}" type="text" name="project" id="project" value="{{ old('project', $atpProcess->project) }}">
                                    @if($errors->has('project'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('project') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.atpProcess.fields.project_helper') }}</small>
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
