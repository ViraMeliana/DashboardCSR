@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.riskMitigationMonitoring.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.id') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.target') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.goal') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->goal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.proactive_mitigation') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->proactive_mitigation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.plan_date') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->plan_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.realization_date') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->realization_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.l') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->l }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.c') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->c }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.risk_level') }}
                        </th>
                        <td>
                            {{ App\Models\RiskMitigationMonitoring::RISK_LEVEL_SELECT[$riskMitigationMonitoring->risk_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.l') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->l_after }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.c') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->c_after }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.risk_level') }}
                        </th>
                        <td>
                            {{ App\Models\RiskMitigationMonitoring::RISK_LEVEL_SELECT[$riskMitigationMonitoring->risk_level_after] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.responsible') }}
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->responsible->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMitigationMonitoring.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\RiskMitigationMonitoring::STATUS_SELECT[$riskMitigationMonitoring->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Document Number
                        </th>
                        <td>
                            {{ $riskMitigationMonitoring->business_document->document_number ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.risk-mitigation-monitorings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
