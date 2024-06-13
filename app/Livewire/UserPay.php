<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Modules\Installment\Entities\Installment;
use Modules\Notebook\Entities\Notebook;

class UserPay extends Component
{

    public $pre_p;
    public $status;
    public $pay;
    public $id=1;
    public $checkout;
    public $display='none';
    public $display_p='none';


    public function calculatePrice($installment_id,)
    {


        $notebooks = Notebook::where('installment_id', $installment_id)
            ->where('status', 0)
            ->get();
//        $notebook_o=Notebook::find($installment_id)->where('status',0);
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

//       $today=Carbon::create(2023,12,9);
        for ($i = 0; $i < $count; $i++) {

            $start_date = Carbon::parse($notebooks[$i]->start_date);
            $end_date = Carbon::parse($notebooks[$i]->end_date);


            switch ($today) {
                case $today<=($end_date) && $today>=($start_date):
                    $diff = $start_date->diffInDays($today);

                    $sum += $installment_price + ($diff * $profit * $all_price);
                    $this->status = 'قبل از سررسید';
                    break;

                case $today == $end_date:

                    $sum += $notebooks[$i]->price;
                    $this->status = 'زمانه سررسید';

                    break;

                case $today->greaterThan($end_date):

                    $diff = $end_date->diffInDays($today);
                    $sum += $installment_price + ($diff * $delay * $all_price);
                    $this->status = 'با دیرکرد';

                    break;

                case $today->lessThan($start_date):

                    $sum+=$per_installment;
                    break;
            }
        }

        $this->display='show';
        $this->checkout=$sum;
        $this->id=$list->id;
        session(['pay'=> $this->checkout]);


    }


    public function payment($id){



        $notebook=Notebook::find($id);
        $notebook->load([
            'installment',

        ]);

        $this->id=$id;
        $price= $notebook->installment->installment_price;
        $month=$notebook->installment->month;
        $installment_price=$price/$month;
        $all_price=$notebook->installment->installment_price;
        $profit=$notebook->installment->profit/($month*30);
        $price_o=$notebook->price;
        $delay=$notebook->installment->delay;
        $s_date=Carbon::parse($notebook->start_date);
        $e_date=Carbon::parse($notebook->end_date);
        $today = Carbon::today();
//        $today=Carbon::create(2023,12,8);


        switch ($e_date){
            case $today<$e_date:
                $diff=$s_date->diffInDays($today);
                $this->pay=$installment_price+($diff*$profit*$all_price);
                $this->status='قبل از سررسید';
                session(['pay'=>$this->pay]);

                break;

            case $today==$e_date:

                $this->pay=$notebook->price;
                $this->status='زمانه سررسید';

                session(['pay'=>$this->pay]);
                break;

            case $today>$e_date:

                $diff=$e_date->diffInDays($today);
                $this->pay=$notebook->price+($diff*$delay*$all_price);
                $this->status='با دیرکرد';

                session(['pay'=>$this->pay]);
                break;

        }

        $this->display_p='show';
    }


    public function close(){

        $this->display_p='none';
    }

    public function close_o(){

        $this->display='none';
    }



    public function render()
    {

        $user=session('user');

        $installment =Installment::where('user_id',$user->id)->get();

        $list=Notebook::where('installment_id',$installment[0]->id)->get();
        $list->load([
            'installment'
        ]);
        return view('livewire.user-pay',compact('list'));
    }
}
