<?php

namespace Modules\Payment\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Installment\Entities\Installment;
use Modules\Payment\Entities\Payment;

class PaymentController extends Controller
{



    public function pay(Request $request,$id,){

        $installment=Installment::find($id);
        $paydate=Carbon::today();
        $installment=Carbon::parse($installment->end_date);
        if ($paydate->greaterThan($installment)){
            Payment::create([
                    'price'=>$request->price,
                    'payday'=>$paydate,
                    'status'=>'دیرکرد',
                    'instllment_id'=>$id

            ]);


        }else if($paydate->lessThan($installment)){

           $price=(integer)floatval(str_replace(',', '',$request->price));

            Payment::create([
                'price'=>$price,
                'payday'=>$paydate,
                'status'=>'قبل سرسید',
                'installment_id'=>$id

            ]);

            return redirect()->back();

        }else if ($paydate=$installment){


        }


    }


}
