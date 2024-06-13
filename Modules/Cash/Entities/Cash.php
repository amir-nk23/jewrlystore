<?php

namespace Modules\Cash\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Cash extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price',
        'status',
        'serial_number',

    ];

    protected static function newFactory()
    {
        return \Modules\Cash\Database\factories\CashFactory::new();
    }


    public function user(){

        return $this->belongsTo(User::class,'user_id');

    }
}
