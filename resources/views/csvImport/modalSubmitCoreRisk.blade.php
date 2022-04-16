<div class="modal fade" id="csvImportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">@lang('global.app_csvImport')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-md-12'>
                        <form class="form-horizontal" method="POST" action="{{ route('admin.core-risks.processCsvImport') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row mb-1">
                                <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                    <label for="csv_file"
                                           class="col-md-4 form-label">@lang('global.app_csv_file_to_import')</label>
                                    <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                                    @if($errors->has('csv_file'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('csv_file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                    <label class="form-label" for="year">Periode</label>
                                    <input type="text" id="year" name="year" class="form-control flatpickr-basic" placeholder="Periode" />

                                    @if($errors->has('year'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-1 mb-1">
                                <div class="col-lg-6 col-md-12 mb-1">
                                    <button type="submit" class="btn btn-primary w-100">
                                        @lang('global.app_commit_csv')
                                    </button>
                                </div>
                                <div class="col-lg-6 col-md-12 mb-1">
                                    <a href="{{ asset(mix('data/template-risks-core.csv')) }}" class="btn btn-outline-primary w-100">
                                        Download Template
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
