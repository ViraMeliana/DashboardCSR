@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tjsl.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tjsls.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tpbs">{{ trans('cruds.tjsl.fields.tpb') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tpbs') ? 'is-invalid' : '' }}" name="tpbs[]" id="tpbs" multiple>
                    @foreach($tpbs as $id => $tpb)
                        <option value="{{ $id }}" {{ in_array($id, old('tpbs', [])) ? 'selected' : '' }}>{{ $tpb }}</option>
                    @endforeach
                </select>
                @if($errors->has('tpbs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tpbs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tjsl.fields.tpb_helper') }}</span>
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