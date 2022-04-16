<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessPartnerIdentification extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const SELF_SMAP_CONTROL_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const RISK_LEVEL_SELECT = [
        'high'   => 'High',
        'medium' => 'Medium',
        'low'    => 'Low',
    ];

    public $table = 'business_partner_identifications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'risk_level',
        'business_partner_id',
        'business_partner_name',
        'address',
        'activity',
        'document_id',
        'smap_implementation',
        'self_smap_control',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function business_partner()
    {
        return $this->belongsTo(BusinessPartner::class, 'business_partner_id');
    }

    public function business_document()
    {
        return $this->belongsTo(DocumentManagement::class, 'document_id');
    }

    public function getValidateDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setValidateDateAttribute($value)
    {
        $this->attributes['validate_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
