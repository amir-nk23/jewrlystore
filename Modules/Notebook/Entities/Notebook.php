<?php

namespace Modules\Notebook\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Installment\Entities\Installment;

class Notebook extends Model
{
    use HasFactory;

    protected $fillable = [

            'price',
            'start_date',
            'end_date',
            'paid',
            'installment_id',
            'status',
             'pay_date',
                'pay_status'

    ];

    protected static function newFactory()
    {
        return \Modules\Notebook\Database\factories\NotebookFactory::new();
    }

    public function installment(){

        return $this->belongsTo(Installment::class,'installment_id');

    }
}
