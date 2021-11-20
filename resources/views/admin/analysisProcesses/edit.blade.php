@extends('layouts/contentLayoutMaster')

@section('title', 'Analysis Process')

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
                        {{ trans('global.edit') }} {{ trans('cruds.analysisProcess.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.analysis-processes.update", [$analysisProcess->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="resources">{{ trans('cruds.analysisProcess.fields.resources') }}</label>
                                    <div style="padding-bottom: 4px">
                                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select class="form-control select2 {{ $errors->has('resources') ? 'is-invalid' : '' }}" name="resources[]" id="resources" multiple required>
                                        @foreach($resources as $id => $resource)
                                            <option value="{{ $id }}" {{ (in_array($id, old('resources', [])) || $analysisProcess->resources->contains($id)) ? 'selected' : '' }}>{{ $resource }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('resources'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('resources') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.analysisProcess.fields.resources_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="main_jobs">{{ trans('cruds.analysisProcess.fields.main_job') }}</label>
                                    <div style="padding-bottom: 4px">
                                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select class="form-control select2 {{ $errors->has('main_jobs') ? 'is-invalid' : '' }}" name="main_jobs[]" id="main_jobs" multiple required>
                                        @foreach($main_jobs as $id => $main_job)
                                            <option value="{{ $id }}" {{ (in_array($id, old('main_jobs', [])) || $analysisProcess->main_jobs->contains($id)) ? 'selected' : '' }}>{{ $main_job }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('main_jobs'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('main_jobs') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.analysisProcess.fields.main_job_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="human_resources">{{ trans('cruds.analysisProcess.fields.human_resource') }}</label>
                                    <div style="padding-bottom: 4px">
                                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select class="form-control select2 {{ $errors->has('human_resources') ? 'is-invalid' : '' }}" name="human_resources[]" id="human_resources" multiple required>
                                        @foreach($human_resources as $id => $human_resource)
                                            <option value="{{ $id }}" {{ (in_array($id, old('human_resources', [])) || $analysisProcess->human_resources->contains($id)) ? 'selected' : '' }}>{{ $human_resource }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('human_resources'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('human_resources') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.analysisProcess.fields.human_resource_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="methods">{{ trans('cruds.analysisProcess.fields.method') }}</label>
                                    <div style="padding-bottom: 4px">
                                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select class="form-control select2 {{ $errors->has('methods') ? 'is-invalid' : '' }}" name="methods[]" id="methods" multiple required>
                                        @foreach($methods as $id => $method)
                                            <option value="{{ $id }}" {{ (in_array($id, old('methods', [])) || $analysisProcess->methods->contains($id)) ? 'selected' : '' }}>{{ $method }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('methods'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('methods') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.analysisProcess.fields.method_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="supporting_processes">{{ trans('cruds.analysisProcess.fields.supporting_process') }}</label>
                                    <div style="padding-bottom: 4px">
                                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select class="form-control select2 {{ $errors->has('supporting_processes') ? 'is-invalid' : '' }}" name="supporting_processes[]" id="supporting_processes" multiple required>
                                        @foreach($supporting_processes as $id => $supporting_process)
                                            <option value="{{ $id }}" {{ (in_array($id, old('supporting_processes', [])) || $analysisProcess->supporting_processes->contains($id)) ? 'selected' : '' }}>{{ $supporting_process }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('supporting_processes'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('supporting_processes') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.analysisProcess.fields.supporting_process_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="date">{{ trans('cruds.analysisProcess.fields.date') }}</label>
                                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $analysisProcess->date) }}">
                                    @if($errors->has('date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('date') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.analysisProcess.fields.date_helper') }}</small>
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
