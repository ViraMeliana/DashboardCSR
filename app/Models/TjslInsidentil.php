<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TjslInsidentil extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'tjsl_insidentils';

    public const TYPE_CATEGORY = [
        'sig' => 'SIG',
        'gopho'  => 'GOPHO',
        'sp'  => 'SP',
        'st'  => 'ST',
        'sg'  => 'SG',
        'sbi'  => 'SBI',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'periode',
        'rka',
        'cash_out',
        'commited',
        'realization',
        'category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
