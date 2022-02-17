<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tpb extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'tpbs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tpb_number',
        'rka',
        'cash_out',
        'commited',
        'realization',
        'pilar_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getPeriodeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPeriodeAttribute($value)
    {
        $this->attributes['periode'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function pilar()
    {
        return $this->belongsTo(Pilar::class, 'pilar_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
