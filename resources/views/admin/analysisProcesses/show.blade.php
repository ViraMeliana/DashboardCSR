@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.analysisProcess.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.analysisProcess.fields.id') }}
                        </th>
                        <td>
                            {{ $analysisProcess->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.analysisProcess.fields.resources') }}
                        </th>
                        <td>
                            @foreach($analysisProcess->resources as $key => $resources)
                                <span class="label label-info">{{ $resources->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.analysisProcess.fields.main_job') }}
                        </th>
                        <td>
                            @foreach($analysisProcess->main_jobs as $key => $main_job)
                                <span class="label label-info">{{ $main_job->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.analysisProcess.fields.human_resource') }}
                        </th>
                        <td>
                            @foreach($analysisProcess->human_resources as $key => $human_resource)
                                <span class="label label-info">{{ $human_resource->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.analysisProcess.fields.method') }}
                        </th>
                        <td>
                            @foreach($analysisProcess->methods as $key => $method)
                                <span class="label label-info">{{ $method->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.analysisProcess.fields.supporting_process') }}
                        </th>
                        <td>
                            @foreach($analysisProcess->supporting_processes as $key => $supporting_process)
                                <span class="label label-info">{{ $supporting_process->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.analysisProcess.fields.date') }}
                        </th>
                        <td>
                            {{ $analysisProcess->date }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.analysis-processes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
