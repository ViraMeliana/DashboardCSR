@extends('layouts/contentLayoutMaster')
@section('title', 'TJSL Insidentil')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tjslInsidentil.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tjsl-insidentils.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="periode">{{ trans('cruds.tjslInsidentil.fields.periode') }}</label>
                        <input class="form-control {{ $errors->has('periode') ? 'is-invalid' : '' }}" type="number" name="periode" id="periode" value="{{ old('periode', '') }}" required>
                        @if($errors->has('periode'))
                            <div class="invalid-feedback">
                                {{ $errors->first('periode') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.tjslInsidentil.fields.periode_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="rka">{{ trans('cruds.tjslInsidentil.fields.rka') }}</label>
                        <input class="form-control {{ $errors->has('rka') ? 'is-invalid' : '' }}" type="number" name="rka" id="rka" value="{{ old('rka', '') }}" required>
                        @if($errors->has('rka'))
                            <div class="invalid-feedback">
                                {{ $errors->first('rka') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.tjslInsidentil.fields.rka_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="cash_out">{{ trans('cruds.tjslInsidentil.fields.cash_out') }}</label>
                        <input class="form-control {{ $errors->has('cash_out') ? 'is-invalid' : '' }}" type="number" name="cash_out" id="cash_out" value="{{ old('cash_out', '') }}" required>
                        @if($errors->has('cash_out'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cash_out') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.tjslInsidentil.fields.cash_out_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="commited">{{ trans('cruds.tjslInsidentil.fields.commited') }}</label>
                        <input class="form-control {{ $errors->has('commited') ? 'is-invalid' : '' }}" type="number" name="commited" id="commited" value="{{ old('commited', '') }}" required>
                        @if($errors->has('commited'))
                            <div class="invalid-feedback">
                                {{ $errors->first('commited') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.tjslInsidentil.fields.commited_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required" for="realization">{{ trans('cruds.tjslInsidentil.fields.realization') }}</label>
                        <input class="form-control {{ $errors->has('realization') ? 'is-invalid' : '' }}" type="number" name="realization" id="realization" value="{{ old('realization', '') }}" required>
                        @if($errors->has('realization'))
                            <div class="invalid-feedback">
                                {{ $errors->first('realization') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.tjslInsidentil.fields.realization_helper') }}</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-1">
                        <label class="required">{{ trans('cruds.tjslInsidentil.fields.category') }}</label>
                        <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category" required>
                            <option value disabled {{ old('category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\TjslInsidentil::TYPE_CATEGORY as $key => $label)
                                <option value="{{ $key }}" {{ old('category', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category'))
                            <div class="invalid-feedback">
                                {{ $errors->first('category') }}
                            </div>
                        @endif
                        <p><small
                                class="text-muted">{{ trans('cruds.tjslInsidentil.fields.category_helper') }}</small>
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
