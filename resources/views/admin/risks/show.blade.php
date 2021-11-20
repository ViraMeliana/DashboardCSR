@extends('layouts/contentLayoutMaster')

@section('title', 'Risk')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.risk.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.id') }}
                        </th>
                        <td>
                            {{ $risk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.risk_name') }}
                        </th>
                        <td>
                            {{ $risk->risk_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.risk_process') }}
                        </th>
                        <td>
                            {{ $risk->risk_process }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.description') }}
                        </th>
                        <td>
                            {{ $risk->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.likelihood_baseline') }}
                        </th>
                        <td>
                            {{ $risk->likelihood_baseline }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.consequences_baseline') }}
                        </th>
                        <td>
                            {{ $risk->consequences_baseline }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Baseline Risk Level
                        </th>
                        <td>
                            Rating : {{ $baseline_rating['rating'] }} <br> Responsibility : {{ $baseline_rating['responsibility'] }} <br> Action : {{ $baseline_rating['action'] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.iso') }}
                        </th>
                        <td>
                            {{ $risk->iso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.existing_control') }}
                        </th>
                        <td>
                            {{ $risk->existing_control }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.effectiveness') }}
                        </th>
                        <td>
                            {{ App\Models\Risk::EFFECTIVENESS_RADIO[$risk->effectiveness] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.risk_cause') }}
                        </th>
                        <td>
                            {{ $risk->risk_cause }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.proactive_mitigation') }}
                        </th>
                        <td>
                            {{ $risk->proactive_mitigation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.likelihood_target') }}
                        </th>
                        <td>
                            {{ $risk->likelihood_target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.consequences_target') }}
                        </th>
                        <td>
                            {{ $risk->consequences_target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Target Risk Level
                        </th>
                        <td>
                            Rating : {{ $target_rating['rating'] }} <br> Responsibility : {{ $target_rating['responsibility'] }} <br> Action : {{ $target_rating['action'] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.impact') }}
                        </th>
                        <td>
                            {{ $risk->impact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.reactive_mitigation') }}
                        </th>
                        <td>
                            {{ $risk->reactive_mitigation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.time_schedule') }}
                        </th>
                        <td>
                            {{ $risk->time_schedule }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Risk::TYPE_RADIO[$risk->type] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.risks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>

@endsection
