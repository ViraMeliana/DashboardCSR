<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InputAnalysi extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'input_analysis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'input',
        'analysis_process_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function analysis_process()
    {
        return $this->belongsTo(AnalysisProcess::class, 'analysis_process_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
