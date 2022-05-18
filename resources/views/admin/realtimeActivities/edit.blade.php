@extends('layouts/contentLayoutMaster')

@section('title', 'Realtime Activity')

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
                        {{ trans('global.edit') }} {{ trans('cruds.realtimeActivity.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.realtime-activities.update", [$realtimeActivity->id]) }}" enctype="multipart/form-data">

                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                            <label class="required" for="title">{{ trans('cruds.realtimeActivity.fields.title') }}</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $realtimeActivity->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.realtimeActivity.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group col-6">
                            <label class="required" for="date">{{ trans('cruds.realtimeActivity.fields.date') }}</label>
                            <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $realtimeActivity->date) }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.realtimeActivity.fields.date_helper') }}</span>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                    <label class="required" for="total">{{ trans('cruds.realtimeActivity.fields.total') }}</label>
                                    <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $realtimeActivity->total) }}" step="1" required>
                                    @if($errors->has('total'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('total') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.realtimeActivity.fields.total_helper') }}</span>
                                </div>
                            <div class="form-group col-6">
                                <label class="required" for="quantity">{{ trans('cruds.realtimeActivity.fields.quantity') }}</label>
                                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $realtimeActivity->quantity) }}" step="1" required>
                                @if($errors->has('quantity'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('quantity') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.quantity_helper') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
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

                        <div class="form-group col-4">
                            <label class="required" for="receiver">{{ trans('cruds.realtimeActivity.fields.receiver') }}</label>
                            <input class="form-control {{ $errors->has('receiver') ? 'is-invalid' : '' }}" type="text" name="receiver" id="receiver" value="{{ old('receiver', $realtimeActivity->receiver) }}" required>
                            @if($errors->has('receiver'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('receiver') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.realtimeActivity.fields.receiver_helper') }}</span>
                        </div>
                        <div class="form-group col-4">
                            <label for="number_of_beneficiaries">{{ trans('cruds.realtimeActivity.fields.number_of_beneficiaries') }}</label>
                            <input class="form-control {{ $errors->has('number_of_beneficiaries') ? 'is-invalid' : '' }}" type="number" name="number_of_beneficiaries" id="number_of_beneficiaries" value="{{ old('number_of_beneficiaries', $realtimeActivity->number_of_beneficiaries) }}" step="1">
                            @if($errors->has('number_of_beneficiaries'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number_of_beneficiaries') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.realtimeActivity.fields.number_of_beneficiaries_helper') }}</span>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="location">{{ trans('cruds.realtimeActivity.fields.location') }}</label>
                                <textarea class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" required>{{ old('location', $realtimeActivity->location) }}</textarea>

                                @if($errors->has('location'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('location') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.location_helper') }}</span>
                            </div>
                            <div class="form-group col-6">
                                <label class="required" for="description">{{ trans('cruds.realtimeActivity.fields.description') }}</label>
                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description',$realtimeActivity->description) }}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.realtimeActivity.fields.description_helper') }}</span>
                            </div>
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
