<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnalysisProcess extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'analysis_processes';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }

    public function main_jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function human_resources()
    {
        return $this->belongsToMany(HumanResource::class);
    }

    public function methods()
    {
        return $this->belongsToMany(Method::class);
    }

    public function supporting_processes()
    {
        return $this->belongsToMany(SupportingProcess::class);
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
