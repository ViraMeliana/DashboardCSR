<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvidanceQuartal extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'done' => 'Done',
        'ongoing' => 'Ongoing',
        'cancelled' => 'Cancelled',
    ];
    public const QUARTAL_SELECT = [
        'q1' => 'Q1',
        'q2' => 'Q2',
        'q3' => 'Q3',
        'q4' => 'Q4',
    ];

    public $table = 'evidance_quartals';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'evidance_id',
        'description',
        'quartal',
        'date',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function evidance()
    {
        return $this->belongsTo(Evidance::class, 'evidance_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
