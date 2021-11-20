<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessPartnerDocument extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'business_partner_document';

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at',
        'validate_date'
    ];
    public const VALIDATE_SELECT = [
        'validate' => 'Validate',
        'reject'   => 'Reject',
    ];
    protected $fillable = [
        'document_number',
        'note',
        'type',
        'taget',
        'goal',
        'revision',
        'validate',
        'validate_date',
        'created_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
