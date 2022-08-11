@extends('layouts/contentLayoutMaster')
@section('title', 'TJSL Insidentil')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.tjslInsidentil.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tjslInsidentil.fields.id') }}
                        </th>
                        <td>
                            {{ $tjsl_insidentil->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tjslInsidentil.fields.periode') }}
                        </th>
                        <td>
                            {{ $tjsl_insidentil->periode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tjslInsidentil.fields.rka') }}
                        </th>
                        <td>
                            {{ $tjsl_insidentil->rka }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tjslInsidentil.fields.cash_out') }}
                        </th>
                        <td>
                            {{ $tjsl_insidentil->cash_out }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tjslInsidentil.fields.commited') }}
                        </th>
                        <td>
                            {{ $tjsl_insidentil->commited }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tjslInsidentil.fields.realization') }}
                        </th>
                        <td>
                            {{ $tjsl_insidentil->realization }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tjslInsidentil.fields.category') }}
                        </th>
                        <td>
                            {{ $tjsl_insidentil->category }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.tjsl-insidentils.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
