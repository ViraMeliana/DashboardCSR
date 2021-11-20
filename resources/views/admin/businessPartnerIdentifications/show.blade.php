@extends('layouts/contentLayoutMaster')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.businessPartnerIdentification.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.id') }}
                        </th>
                        <td>
                            {{ $businessPartnerIdentification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.risk_level') }}
                        </th>
                        <td>
                            {{ App\Models\BusinessPartnerIdentification::RISK_LEVEL_SELECT[$businessPartnerIdentification->risk_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.business_partner') }}
                        </th>
                        <td>
                            {{ $businessPartnerIdentification->business_partner->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.business_partner_name') }}
                        </th>
                        <td>
                            {{ $businessPartnerIdentification->business_partner_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.address') }}
                        </th>
                        <td>
                            {{ $businessPartnerIdentification->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.activity') }}
                        </th>
                        <td>
                            {{ $businessPartnerIdentification->activity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.smap_implementation') }}
                        </th>
                        <td>
                            {{ $businessPartnerIdentification->smap_implementation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.self_smap_control') }}
                        </th>
                        <td>
                            {{ App\Models\BusinessPartnerIdentification::SELF_SMAP_CONTROL_RADIO[$businessPartnerIdentification->self_smap_control] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartnerIdentification.fields.description') }}
                        </th>
                        <td>
                            {{ $businessPartnerIdentification->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Document Number
                        </th>
                        <td>
                            {{ $businessPartnerIdentification->business_document->document_number }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.business-partner-identifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
