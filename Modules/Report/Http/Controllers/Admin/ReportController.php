<?php

namespace Modules\Report\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cash\Entities\Cash;
use Modules\Installment\Entities\Installment;
use Modules\Notebook\Entities\Notebook;
use Modules\Report\Entities\Report;
use Modules\User\Entities\User;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
//        $report = Report::all();
//        $report->load([
//           'user',
//        ]);
        $users = User::all();

        return view('report::Admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('report::create');
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
    public function show(Request $request)
    {

        $name= $request->user_name;
        $i_status = $request->i_status;
        $j_sdate=explode('/',$request->start_date);
        $j_edate=explode('/',$request->end_date);
        $status = $request->status;
        $start_date=Carbon::parse(jalali_to_gregorian($j_sdate[0],$j_sdate[1],$j_sdate[2],'-'));
        $end_date=Carbon::parse(jalali_to_gregorian($j_edate[0],$j_edate[1],$j_edate[2],'-'));
        $installment_status=$request->installment_status;
        $query=[];
        $P_query=[];
        $query_en=[];

        if ($i_status == 'installment'){

            $query = Installment::query()
                ->when($name!='all',function ($query) use ($name){

                    return $query->where('user_id',$name);

                })->when($name='all',function ($query){

                    return $query;

                })->when($j_sdate,function ($query) use ($start_date){

                    return $query->where('created_at','>=',$start_date);

                })->when($j_edate,function ($query) use ($end_date){

                    return $query->where('created_at','<=',$end_date);

                })->when($installment_status!='all',function ($query) use ($installment_status){

                    return $query->where('pay_ststus',$installment_status);

                })->when($installment_status=='all',function ($query) use ($installment_status){

                    return $query;

                })
                ->get();




        }else if($i_status == 'notebook'){


            $query_en=Notebook::query()
                ->when($status!='all',function ($query) use ($status)
                {
                    return $query->where('pay_status',$status);

                })
                ->when($status=='all',function ($query) use ($status)
                {
                    return $query;

                })
                ->whereHas('installment',function ($query) use ($name){


                if ($name=='all'){

                    return $query;

                }else{

                    return $query->where('user_id',$name);
                }

            })->get();



        }

        if ($request->cash!=null){


            $P_query = Cash::query()
                ->when($name!='all',function ($query) use ($name){

                    return $query->where('user_id',$name);

                }) ->when($name=='all',function ($query) use ($name){

                    return $query;

                })->when($j_sdate,function ($query) use ($start_date){

                return $query->where('created_at','>=',$start_date);

             })->when($j_edate,function ($query) use ($end_date){

                return $query->where('created_at','<=',$end_date);

              })->get();


        }







        return view('report::Admin.show',compact('query','P_query','query_en'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('report::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
