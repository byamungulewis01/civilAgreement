<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agreement extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'category',
        'description',
        'amount',
        'partyOne',
        'partyTwo',
        'status',
        'acceptedDate',
        'rejectedDate',
        'completedDate',
        'duration',
        'whoToPay',
        'created_by',
    ];


    public function party1()
    {
        return $this->belongsTo(Civilian::class, 'partyOne');
    }
    public function party2()
    {
        return $this->belongsTo(Civilian::class, 'partyTwo');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }
}
