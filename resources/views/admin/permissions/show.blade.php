@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.permission.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.permission.fields.id') }}
                        </th>
                        <td>
                            {{ $permission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permission.fields.title') }}
                        </th>
                        <td>
                            {{ $permission->title }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.permissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
