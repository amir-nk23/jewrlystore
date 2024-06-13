<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cash\Entities\Cash;
use Modules\Notebook\Entities\Notebook;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $notebook=Notebook::where('status',0)->get();
        $notebook->load(['installment.user']);
        $i_sum=0;
        $c_sum=0;

        $installments= Notebook::whereDate('created_at', '>=', now()->subDays(30))->get();
        $cashes= Cash::whereDate('created_at', '>=', now()->subDays(30))->get();

        foreach ($installments as $installment){

            $i_sum=$i_sum+$installment->paid;

        }

        foreach ($cashes as $cash){

            $c_sum=$c_sum+$cash->price;

        }

        $sum=$c_sum+$i_sum;


        return view('dashboard::Admin.index',compact('notebook','i_sum','c_sum','sum'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::create');
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
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dashboard::edit');
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
