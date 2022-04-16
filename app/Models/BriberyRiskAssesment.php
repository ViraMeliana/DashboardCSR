<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BriberyRiskAssesment extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const RISK_LEVEL_SELECT = [
        'high'   => 'High',
        'medium' => 'Medium',
        'low'    => 'Low',
    ];

    public const RISK_LEVEL_TARGET_SELECT = [
        'high'   => 'High',
        'medium' => 'Medium',
        'low'    => 'Low',
    ];

    public $table = 'bribery_risk_assesments';

    protected $appends = [
        'reviewed_signature',
        'approved_signature',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'atp_process_id',
        'requirements',
        'bribery_risk',
        'impact',
        'risk_causes',
        'internal_control',
        'l',
        'c',
        'document_id',
        'criteria_impact',
        'risk_level',
        'proactive_mitigation',
        'l_target',
        'c_target',
        'risk_level_target',
        'opportunity',
        'description',
        'personal_identification_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function atp_process()
    {
        return $this->belongsTo(AtpProcess::class, 'atp_process_id');
    }

    public function business_document()
    {
        return $this->belongsTo(DocumentManagement::class, 'document_id');
    }

    public function personal_identification()
    {
        return $this->belongsTo(Position::class, 'personal_identification_id');
    }

    public function getReviewedSignatureAttribute()
    {
        $file = $this->getMedia('reviewed_signature')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getApprovedSignatureAttribute()
    {
        $file = $this->getMedia('approved_signature')->last();
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
