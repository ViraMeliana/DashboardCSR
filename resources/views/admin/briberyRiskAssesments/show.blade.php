@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.briberyRiskAssesment.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                           Document Number
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->business_document->document_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.id') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.atp_process') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->atp_process->activity ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.requirements') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->requirements }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.bribery_risk') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->bribery_risk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.impact') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->impact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.risk_causes') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->risk_causes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.internal_control') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->internal_control }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.l') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->l }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.c') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->c }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.criteria_impact') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->criteria_impact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.risk_level') }}
                        </th>
                        <td>
                            {{ App\Models\BriberyRiskAssesment::RISK_LEVEL_SELECT[$briberyRiskAssesment->risk_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.proactive_mitigation') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->proactive_mitigation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.l_target') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->l_target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.c_target') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->c_target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.risk_level_target') }}
                        </th>
                        <td>
                            {{ App\Models\BriberyRiskAssesment::RISK_LEVEL_TARGET_SELECT[$briberyRiskAssesment->risk_level_target] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.opportunity') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->opportunity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.description') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.briberyRiskAssesment.fields.personal_identification') }}
                        </th>
                        <td>
                            {{ $briberyRiskAssesment->personal_identification->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.bribery-risk-assesments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
