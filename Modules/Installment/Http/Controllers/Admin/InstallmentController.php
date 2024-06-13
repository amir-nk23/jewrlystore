<?php

namespace Modules\Installment\Http\Controllers\Admin;

use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Installment\Entities\Installment;
use Modules\Notebook\Entities\Notebook;
use Modules\Payment\Entities\Payment;
use Modules\Product\Entities\Product;
use Modules\Report\Entities\Report;
use Modules\Setting\Entities\Setting;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $installment=Installment::orderBy('id','DESC')->get()->load(['user','product']);

        return view('installment::Admin.index',compact('installment'));
    }



    public function show($id){

        $list = Installment::find($id);
//        session(['id' => $id]);
        Session::put('id',$id, now()->addMinute(30));
        return view('installment::Admin.show',compact('list'));
    }

    public function pay($price){





    }


    public function create(){

        $user =\Modules\User\Entities\User::all();
        $product=Product::all();
        return view('installment::Admin.create',compact('user','product'));


    }

    public function store(Request $request){

        $setting=Setting::select('month','profit')->first();
        $profit=$setting->profit;
        $per_month_profit=$profit/$setting->month;
        $delay=$request->delay/100;
        $month=$setting->month;
        if ($request->month!=''){

            $month=$request->month;
        }
        $installment_price=$request->price-$request->down_payment;
        $DB_date=Carbon::today();
        $start_date=Carbon::today();
        $end_date=$start_date->addMonth($month);



     $instalment= Installment::create([
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_name,
            'account_number'=>$request->account_number,
            'bank'=>$request->bank,
            'down_payment'=>$request->down_payment,
            'delay'=>$delay,
            'profit'=>$profit,
            'month'=>$month,
            'status'=>0,
            'start_date'=>$DB_date,
            'end_date'=>$end_date,
            'price'=>$request->price,
            'installment_price'=>$installment_price,
            'exchange'=>$request->exchange,
            'per_month_profit'=>$per_month_profit,
        ]);

     $this->Notebook();


        Report::create([
            'status'=>'قسط بندی',
            'date'=>Carbon::today(),
            'user_id'=>$request->user_id,
        ]);

        toastr()->success('قسط جدید ثبت شد');

        return redirect()->route('admin.installment.index');

    }


    public function Notebook(){

        $Installment=Installment::latest()->first();
        $profit=$Installment->profit;
        $month=$Installment->month;
        $price=$Installment->price;
        $installment_price=$Installment->installment_price;
        $id=$Installment->id;
        $start_date=Carbon::parse($Installment->start_date);

        $DB_date=Carbon::parse($Installment->start_date);
        $month_profit=$profit/$month;
        $price_p=$installment_price/$month;
//        $payment=($price*$month_profit)/(1-pow(1+$month_profit,-$month));

        $payment=($installment_price*$profit/$month+$price_p);

            $end_date=$DB_date->addDay(30);

        for($i=1;$i<=$month;$i++){
            if($i!=1){
                $start_date->addDay(30);
            }

            Notebook::create([
                'price'=>$payment,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
                'paid'=>0,
                'installment_id'=>$id,
                'status'=>0,
            ]);
            $end_date=$end_date->addDay(30);
        }


    }


    public function payment($id){


    $this->calculatePrice($id);

    $installmetn =Installment::find($id);

    $installmetn->update([
       'status'=>1

    ]);

        return redirect()->back();

    }





    public function calculatePrice($installment_id)
    {


        $notebooks = Notebook::where('installment_id', $installment_id)
            ->where('status', 0)
            ->get();



        $list = Installment::where('id', $installment_id)->first();
        $count = $notebooks->count();
        $price = $list->installment_price;
        $month = $list->month;
        $installment_price = $price / $month;
        $all_price = $list->installment_price;
        $profit = $list->per_month_profit * $month / ($month * 30);
        $per_installment = $list->installment_price / $month;
//        $price_o=$notebooks->price;
        $delay = $list->delay;
        $today = Carbon::today();
        $sum = 0;

//        $list->update([
//            'status'=>1,
//
//        ]);

//        $today=Carbon::create(2023,12,6);
        for ($i = 0; $i < $count; $i++) {

            $start_date = Carbon::parse($notebooks[$i]->start_date);
            $end_date = Carbon::parse($notebooks[$i]->end_date);


            switch ($today) {
                case $today->lessThan($end_date) && $today->greaterThan($start_date):
                    $diff = $start_date->diffInDays($today);

                    $sum = $installment_price + ($diff * $profit * $all_price);
                    $status = 'قبل از سررسید';
                    $record=Notebook::find($notebooks[$i]->id);
                    $today=Carbon::today();

                    $record->update([
                        'paid'=>$sum,
                        'status'=>1,
                        'pay_date'=>$today,
                        'pay_status'=>$status
                    ]);
                    break;

                case $today == $end_date:

                    $sum = $notebooks[$i]->price;
                    $status = 'زمانه سررسید';
                    $record=Notebook::find($notebooks[$i]->id);
                    $today=Carbon::today();

                    $record->update([
                        'paid'=>$sum,
                        'status'=>1,
                        'pay_date'=>$today,
                        'pay_status'=>$status
                    ]);
                    break;

                case $today->greaterThan($end_date):

                    $diff = $end_date->diffInDays($today);
                    $sum = $installment_price + ($diff * $delay * $all_price);
                    $status = 'با دیرکرد';
                    $record=Notebook::find($notebooks[$i]->id);
                    $today=Carbon::today();

                    $record->update([
                        'paid'=>$sum,
                        'status'=>1,
                        'pay_date'=>$today,
                        'pay_status'=>$status
                    ]);
                    break;

                case $today<=($start_date):

                    $sum = $per_installment;
                    $record=Notebook::find($notebooks[$i]->id);
                    $today=Carbon::today();
                    $status = 'زمانه سررسید';

                    $record->update([
                        'paid'=>$sum,
                        'status'=>1,
                        'pay_date'=>$today,
                        'pay_status'=>$status
                    ]);
                    break;
            }
        }



    }



}
