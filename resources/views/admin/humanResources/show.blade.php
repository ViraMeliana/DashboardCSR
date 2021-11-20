@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.humanResource.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.humanResource.fields.id') }}
                        </th>
                        <td>
                            {{ $humanResource->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.humanResource.fields.name') }}
                        </th>
                        <td>
                            {{ $humanResource->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.humanResource.fields.competence') }}
                        </th>
                        <td>
                            {{ $humanResource->competence }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.humanResource.fields.awareness') }}
                        </th>
                        <td>
                            {{ $humanResource->awareness }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.humanResource.fields.scope') }}
                        </th>
                        <td>
                            {{ $humanResource->scope }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.humanResource.fields.jobdesc') }}
                        </th>
                        <td>
                            {{ $humanResource->jobdesc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.humanResource.fields.user') }}
                        </th>
                        <td>
                            {{ $humanResource->user->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.human-resources.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
