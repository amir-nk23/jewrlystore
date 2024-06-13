<?php

namespace Modules\Notebook\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Installment\Entities\Installment;
use Modules\Notebook\Entities\Notebook;
use Modules\Report\Entities\Report;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('notebook::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('notebook::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('notebook::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('notebook::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,$id)
    {
            $notebook=Notebook::find($id);
            $pay= session('pay');
            $date=Carbon::today();


        if($date<$notebook->start_date){

            toastr()->error('لطفا قبله زمانه شروع سررسید اقدام به پرداخت نفرمایید');

            return redirect()->back();
        }

        if($notebook->status==1){

            toastr()->error('این قسط قبلا پرداخت شده');

            return redirect()->back();
        }

            $notebook->update([
               'paid'=>$pay,
               'status'=>1,
                'pay_status'=>$request->status,
                'pay_date'=>$date,
            ]);

            $notebook->load([
               'installment.user'
            ]);


            if (count(Notebook::where(['installment_id'=>$notebook->installment_id,'status'=>0])->get())==0){

                $installmetn=Installment::where('id',$notebook->installment_id);
                $installmetn->update([

                    'status'=>1

                ]);


            }


            $installmetn=Installment::where('id',$notebook->installment_id);
            $installmetn->update([
                'paid'=>+$pay
            ]);

            Report::create(
                [
                    'status'=>$request->status,
                    'date'=>Carbon::today(),
                    'notebook_id'=>$notebook->id,
                    'user_id'=>$notebook->installment->user->id
                ]
            );

        toastr()->success('قسط پرداخت شد');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
