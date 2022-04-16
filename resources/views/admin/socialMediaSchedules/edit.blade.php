@extends('layouts/contentLayoutMaster')

@section('title', 'Social Media Schedules')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">

@endsection
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ trans('global.edit') }} {{ trans('cruds.socialMediaSchedules.title_singular') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.social-media-schedules.update", [$socialMediaSchedule->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="date">{{ trans('cruds.socialMediaSchedules.fields.date') }}</label>
                                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $socialMediaSchedule->date) }}" required>
                                    @if($errors->has('date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('date') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.socialMediaSchedules.fields.date_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required" for="event">{{ trans('cruds.socialMediaSchedules.fields.event') }}</label>
                                    <input class="form-control {{ $errors->has('event') ? 'is-invalid' : '' }}" type="text" name="event" id="event" value="{{ old('event', $socialMediaSchedule->event) }}" required>
                                    @if($errors->has('event'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('event') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.socialMediaSchedules.fields.event_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="description">{{ trans('cruds.socialMediaSchedules.fields.description') }}</label>
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $socialMediaSchedule->description) }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.socialMediaSchedules.fields.description_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="required">{{ trans('cruds.socialMediaSchedules.fields.type') }}</label>
                                    @foreach(App\Models\SocialMediaSchedule::TYPE_RADIO as $key => $label)
                                        <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                                            <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', $socialMediaSchedule->type) === (string) $key ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                    @if($errors->has('type'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('type') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.socialMediaSchedules.fields.type_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="photos">{{ trans('cruds.socialMediaSchedules.fields.media') }}</label>
                                    <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                                    </div>
                                    @if($errors->has('photos'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('photos') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.socialMediaSchedules.fields.media_helper') }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label for="caption">{{ trans('cruds.socialMediaSchedules.fields.caption') }}</label>
                                    <textarea class="form-control {{ $errors->has('caption') ? 'is-invalid' : '' }}" name="caption" id="caption">{{ old('caption', $socialMediaSchedule->caption) }}</textarea>
                                    @if($errors->has('caption'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('caption') }}
                                        </div>
                                    @endif
                                    <p><small
                                            class="text-muted">{{ trans('cruds.socialMediaSchedules.fields.caption_helper') }}</small>
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
    <script>
        $('.select2').select2();
    </script>
    <script>
        var uploadedMediaMap = {}
        Dropzone.options.photosDropzone = {
            url: '{{ route('admin.social-media-schedules.storeMedia') }}',
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
                $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
                uploadedMediaMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedMediaMap[file.name]
                }
                $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($socialMediaSchedule) && $socialMediaSchedule->photos)
                var files = {!! json_encode($socialMediaSchedule->photos) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
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
