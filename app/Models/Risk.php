<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Risk extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const EFFECTIVENESS_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const TYPE_RADIO = [
        'negative' => 'Negative',
        'positive' => 'Positive',
    ];

    public $table = 'risks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'risk_name',
        'risk_process',
        'description',
        'likelihood_baseline',
        'consequences_baseline',
        'iso',
        'existing_control',
        'effectiveness',
        'risk_cause',
        'proactive_mitigation',
        'likelihood_target',
        'consequences_target',
        'impact',
        'reactive_mitigation',
        'time_schedule',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
