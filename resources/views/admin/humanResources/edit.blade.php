@extends('layouts/contentLayoutMaster')

@section('title', 'Human Resources')

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
                        {{ trans('global.edit') }} {{ trans('cruds.humanResource.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.human-resources.update", [$humanResource->id]) }}" enctype="multipart/form-data">

                    @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="name">{{ trans('cruds.humanResource.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $humanResource->name) }}" required>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.humanResource.fields.name_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="competence">{{ trans('cruds.humanResource.fields.competence') }}</label>
                                    <input class="form-control {{ $errors->has('competence') ? 'is-invalid' : '' }}" type="text" name="competence" id="competence" value="{{ old('competence', $humanResource->competence) }}" required>
                                    @if($errors->has('competence'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('competence') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.humanResource.fields.competence_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="awareness">{{ trans('cruds.humanResource.fields.awareness') }}</label>
                                    <input class="form-control {{ $errors->has('awareness') ? 'is-invalid' : '' }}" type="text" name="awareness" id="awareness" value="{{ old('awareness', $humanResource->awareness) }}" required>
                                    @if($errors->has('awareness'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('awareness') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.humanResource.fields.awareness_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="scope">{{ trans('cruds.humanResource.fields.scope') }}</label>
                                    <textarea class="form-control {{ $errors->has('scope') ? 'is-invalid' : '' }}" name="scope" id="scope" required>{{ old('scope', $humanResource->scope) }}</textarea>
                                    @if($errors->has('scope'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('scope') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.humanResource.fields.scope_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="jobdesc">{{ trans('cruds.humanResource.fields.jobdesc') }}</label>
                                    <textarea class="form-control {{ $errors->has('jobdesc') ? 'is-invalid' : '' }}" name="jobdesc" id="jobdesc" required>{{ old('jobdesc', $humanResource->jobdesc) }}</textarea>
                                    @if($errors->has('jobdesc'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('jobdesc') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.humanResource.fields.jobdesc_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="user_id">{{ trans('cruds.humanResource.fields.user') }}</label>
                                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                                        @foreach($users as $id => $entry)
                                            <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $humanResource->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('user'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('user') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.humanResource.fields.user_helper') }}</small>
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
