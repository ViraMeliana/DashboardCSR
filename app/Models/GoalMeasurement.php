<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoalMeasurement extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'goal_measurements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kpi',
        'target',
        'analysi_process_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function analysi_process()
    {
        return $this->belongsTo(AnalysisProcess::class, 'analysi_process_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
