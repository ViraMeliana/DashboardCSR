@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.goalMeasurement.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.goalMeasurement.fields.id') }}
                        </th>
                        <td>
                            {{ $goalMeasurement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.goalMeasurement.fields.kpi') }}
                        </th>
                        <td>
                            {{ $goalMeasurement->kpi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.goalMeasurement.fields.target') }}
                        </th>
                        <td>
                            {{ $goalMeasurement->target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.goalMeasurement.fields.analysi_process') }}
                        </th>
                        <td>
                            {{ $goalMeasurement->analysi_process->date ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.goal-measurements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
