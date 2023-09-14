<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory,HasUuids;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'agreement_id',
        'type',
        'amount',
        'status',
        'transactionReference',
    ];

    public function agreement()
    {
        return $this->belongsTo(Agreement::class, 'agreement_id');
    }

}
