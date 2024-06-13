<?php

namespace Modules\Installment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;
use Modules\User\Entities\User;

class Installment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'account_number',
        'bank',
        'down_payment',
        'delay',
        'profit',
        'month',
        'status',
        'start_date',
        'end_date',
        'price',
        'installment_price',
        'exchange',
        'per_month_profit'
    ];

    protected static function newFactory()
    {
        return \Modules\Installment\Database\factories\InstallmentFactory::new();
    }

    public function user(){

        return $this->belongsTo(User::class,'user_id');

    }
    public function product(){

        return $this->belongsTo(Product::class,'product_id');

    }
}
