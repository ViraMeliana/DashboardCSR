<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoreRisk extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'core_risks';

    protected $dates = [
        'year',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'subject',
        'description',
        'year',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function risikos()
    {
        return $this->belongsToMany(Risiko::class);
    }

    public function getYearAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setYearAttribute($value)
    {
        $this->attributes['year'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
