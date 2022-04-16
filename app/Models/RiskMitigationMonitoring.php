<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RiskMitigationMonitoring extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const RISK_LEVEL_SELECT = [
        'high'   => 'High',
        'medium' => 'Medium',
        'low'    => 'Low',
    ];

    public const STATUS_SELECT = [
        'inprogress' => 'In Progress',
        'done'       => 'Done',
        'upcoming'   => 'Up Coming',
    ];

    public $table = 'risk_mitigation_monitorings';

//    protected $appends = [
//        'accepted_signature',
//        'check_signature',
//        'prepare_signature',
//    ];

    protected $dates = [
        'plan_date',
        'realization_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'proactive_mitigation',
        'target',
        'goal',
        'plan_date',
        'realization_date',
        'l',
        'c',
        'risk_level',
        'l_after',
        'c_after',
        'risk_level_after',
        'responsible_id',
        'document_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPlanDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPlanDateAttribute($value)
    {
        $this->attributes['plan_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRealizationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRealizationDateAttribute($value)
    {
        $this->attributes['realization_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function business_document()
    {
        return $this->belongsTo(DocumentManagement::class, 'document_id');
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    public function getAcceptedSignatureAttribute()
    {
        $file = $this->getMedia('accepted_signature')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getCheckSignatureAttribute()
    {
        $file = $this->getMedia('check_signature')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getPrepareSignatureAttribute()
    {
        $file = $this->getMedia('prepare_signature')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
