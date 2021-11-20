@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.atpProcess.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.atpProcess.fields.id') }}
                        </th>
                        <td>
                            {{ $atpProcess->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atpProcess.fields.activity') }}
                        </th>
                        <td>
                            {{ $atpProcess->activity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atpProcess.fields.description') }}
                        </th>
                        <td>
                            {{ $atpProcess->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atpProcess.fields.transaction') }}
                        </th>
                        <td>
                            {{ $atpProcess->transaction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.atpProcess.fields.project') }}
                        </th>
                        <td>
                            {{ $atpProcess->project }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.atp-processes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
