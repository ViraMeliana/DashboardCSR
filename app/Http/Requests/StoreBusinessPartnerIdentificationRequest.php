<?php

namespace App\Http\Requests;

use App\Models\BusinessPartnerIdentification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBusinessPartnerIdentificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('business_partner_identification_create');
    }

    public function rules()
    {
        return [
            'risk_level' => [
                'required',
            ],
            'business_partner_id' => [
                'required',
                'integer',
            ],
            'business_partner_name' => [
                'string',
                'required',
            ],
            'address' => [
                'required',
            ],
            'activity' => [
                'string',
                'required',
            ],
            'document_number' => [
                'string',
                'required',
            ],
            'smap_implementation' => [
                'required',
            ],
            'self_smap_control' => [
                'required',
            ],
            'validate_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
