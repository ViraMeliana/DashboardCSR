<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mitigation extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const CATEGORY_SELECT = [
        'proactive' => 'Proactive',
        'reactive'  => 'Reactive',
    ];

    public $table = 'mitigations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'subject',
        'category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function evidances()
    {
        return $this->belongsToMany(Evidance::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
