@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.outputAnalysi.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.outputAnalysi.fields.id') }}
                        </th>
                        <td>
                            {{ $outputAnalysi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outputAnalysi.fields.output') }}
                        </th>
                        <td>
                            {{ $outputAnalysi->output }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outputAnalysi.fields.analysis_process') }}
                        </th>
                        <td>
                            {{ $outputAnalysi->analysis_process->date ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.output-analysis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
