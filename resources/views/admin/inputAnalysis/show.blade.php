@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.inputAnalysi.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAnalysi.fields.id') }}
                        </th>
                        <td>
                            {{ $inputAnalysi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAnalysi.fields.input') }}
                        </th>
                        <td>
                            {{ $inputAnalysi->input }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inputAnalysi.fields.analysis_process') }}
                        </th>
                        <td>
                            {{ $inputAnalysi->analysis_process->date ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.input-analysis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
