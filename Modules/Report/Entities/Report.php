<?php

namespace Modules\Report\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'status',
        'date',
        'notebook_id',
        'user_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Report\Database\factories\ReportFactory::new();
    }


    public function user(){

        return $this->belongsTo(User::class,'user_id');

    }

}
