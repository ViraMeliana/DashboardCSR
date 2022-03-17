<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <h5 class="modal-title" id="editModal">Edit Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.core-risks.updateQuartal') }}" id="editForm" class="add-new-record modal-content pt-0">
                @csrf

                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label for="date">{{ trans('cruds.evidance.fields.date') }}</label>
                        <input type="hidden" name="evidance_id" id="evidance_id">
                        <input class="form-control mb-1 flatpickr-basic {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}"
                               placeholder="YYYY-MM-DD" required>
                        @if($errors->has('date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('date') }}
                            </div>
                        @endif
                        <small class="form-text">{{ trans('cruds.evidance.fields.date_helper') }}</small>
                    </div>
                    <div class="mb-1">
                        <label for="status">{{ trans('cruds.evidance.fields.status') }}</label>
                        <select class="form-control mb-1 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                            <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\EvidanceQuartal::STATUS_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('status') }}
                            </div>
                        @endif
                        <small class="form-text">{{ trans('cruds.evidance.fields.status_helper') }}</small>
                    </div>
                    <div class="mb-1">
                        <label for="quartal">{{ trans('cruds.evidance.fields.quartal') }}</label>
                        <select class="form-control mb-1 {{ $errors->has('quartal') ? 'is-invalid' : '' }}" name="quartal" id="quartal" required>
                            <option value disabled {{ old('quartal', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\EvidanceQuartal::QUARTAL_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('quartal', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('quartal'))
                            <div class="invalid-feedback">
                                {{ $errors->first('quartal') }}
                            </div>
                        @endif
                        <small class="form-text">{{ trans('cruds.evidance.fields.quartal_helper') }}</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
