@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.realtimeActivity.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.realtime-activities.update", [$realtimeActivity->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.realtimeActivity.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $realtimeActivity->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.realtimeActivity.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $realtimeActivity->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.realtimeActivity.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RealtimeActivity::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $realtimeActivity->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.realtimeActivity.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $realtimeActivity->total) }}" step="1" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.realtimeActivity.fields.location') }}</label>
                <select class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" name="location" id="location" required>
                    <option value disabled {{ old('location', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RealtimeActivity::LOCATION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('location', $realtimeActivity->location) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.realtimeActivity.fields.village') }}</label>
                <select class="form-control {{ $errors->has('village') ? 'is-invalid' : '' }}" name="village" id="village">
                    <option value disabled {{ old('village', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RealtimeActivity::VILLAGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('village', $realtimeActivity->village) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('village'))
                    <div class="invalid-feedback">
                        {{ $errors->first('village') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.village_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.realtimeActivity.fields.subdistrict') }}</label>
                <select class="form-control {{ $errors->has('subdistrict') ? 'is-invalid' : '' }}" name="subdistrict" id="subdistrict">
                    <option value disabled {{ old('subdistrict', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RealtimeActivity::SUBDISTRICT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('subdistrict', $realtimeActivity->subdistrict) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('subdistrict'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subdistrict') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.subdistrict_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.realtimeActivity.fields.district') }}</label>
                <select class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district" id="district">
                    <option value disabled {{ old('district', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RealtimeActivity::DISTRICT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('district', $realtimeActivity->district) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.realtimeActivity.fields.province') }}</label>
                <select class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province" id="province">
                    <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RealtimeActivity::PROVINCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('province', $realtimeActivity->province) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('province'))
                    <div class="invalid-feedback">
                        {{ $errors->first('province') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.province_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="receiver">{{ trans('cruds.realtimeActivity.fields.receiver') }}</label>
                <input class="form-control {{ $errors->has('receiver') ? 'is-invalid' : '' }}" type="text" name="receiver" id="receiver" value="{{ old('receiver', $realtimeActivity->receiver) }}" required>
                @if($errors->has('receiver'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receiver') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.receiver_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_beneficiaries">{{ trans('cruds.realtimeActivity.fields.number_of_beneficiaries') }}</label>
                <input class="form-control {{ $errors->has('number_of_beneficiaries') ? 'is-invalid' : '' }}" type="number" name="number_of_beneficiaries" id="number_of_beneficiaries" value="{{ old('number_of_beneficiaries', $realtimeActivity->number_of_beneficiaries) }}" step="1">
                @if($errors->has('number_of_beneficiaries'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_beneficiaries') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.number_of_beneficiaries_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.realtimeActivity.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.photo_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.realtime-activities.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($realtimeActivity) && $realtimeActivity->photo)
      var files = {!! json_encode($realtimeActivity->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
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