@extends('layouts/contentLayoutMaster')
@section('title', 'Work Instruction')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.workInstruction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.work-instructions.update", [$work_instruction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="no_urut">{{ trans('cruds.workInstruction.fields.no_urut') }}</label>
                        <input class="form-control {{ $errors->has('no_urut') ? 'is-invalid' : '' }}" type="number" name="no_urut" id="no_urut" value="{{ old('no_urut', $work_instruction->no_urut) }}" required>
                        @if($errors->has('no_urut'))
                            <div class="invalid-feedback">
                                {{ $errors->first('no_urut') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.workInstruction.fields.no_urut_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="no_ik">{{ trans('cruds.workInstruction.fields.no_ik') }}</label>
                        <input class="form-control {{ $errors->has('no_ik') ? 'is-invalid' : '' }}" type="number" name="no_ik" id="no_ik" value="{{ old('no_ik', $work_instruction->no_ik) }}" required>
                        @if($errors->has('no_ik'))
                            <div class="invalid-feedback">
                                {{ $errors->first('no_ik') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.workInstruction.fields.no_ik_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="work_unit">{{ trans('cruds.workInstruction.fields.work_unit') }}</label>
                        <input class="form-control {{ $errors->has('work_unit') ? 'is-invalid' : '' }}" type="text" name="work_unit" id="work_unit" value="{{ old('work_unit', $work_instruction->work_unit) }}" required>
                        @if($errors->has('work_unit'))
                            <div class="invalid-feedback">
                                {{ $errors->first('work_unit') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.workInstruction.fields.work_unit_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="publish_date">{{ trans('cruds.workInstruction.fields.publish_date') }}</label>
                        <input class="form-control {{ $errors->has('publish_date') ? 'is-invalid' : '' }}" type="date" name="publish_date" id="publish_date" value="{{ old('publish_date', $work_instruction->publish_date) }}" required>
                        @if($errors->has('publish_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('publish_date') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.workInstruction.fields.publish_date_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="reassessment_date">{{ trans('cruds.workInstruction.fields.reassessment_date') }}</label>
                        <input class="form-control {{ $errors->has('reassessment_date') ? 'is-invalid' : '' }}" type="date" name="reassessment_date" id="reassessment_date" value="{{ old('reassessment_date', $work_instruction->reassessment_date) }}" required>
                        @if($errors->has('reassessment_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reassessment_date') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.workInstruction.fields.reassessment_date_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="check_date">{{ trans('cruds.workInstruction.fields.check_date') }}</label>
                        <input class="form-control {{ $errors->has('check_date') ? 'is-invalid' : '' }}" type="date" name="check_date" id="check_date" value="{{ old('check_date', $work_instruction->check_date) }}" required>
                        @if($errors->has('check_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('check_date') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.workInstruction.fields.check_date_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="tindakan">{{ trans('cruds.workInstruction.fields.tindakan') }}</label>
                        <input class="form-control {{ $errors->has('tindakan') ? 'is-invalid' : '' }}" type="text" name="tindakan" id="tindakan" value="{{ old('tindakan', $work_instruction->tindakan) }}" required>
                        @if($errors->has('tindakan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tindakan') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.workInstruction.fields.tindakan_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="keterangan">{{ trans('cruds.workInstruction.fields.keterangan') }}</label>
                        <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="number" name="keterangan" id="keterangan" required>{{ old('keterangan', $work_instruction->keterangan) }}</textarea>
                        @if($errors->has('keterangan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('keterangan') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.workInstruction.fields.keterangan_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
