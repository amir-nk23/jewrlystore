<?php

namespace Modules\Cash\Http\Controllers\Admin;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cash\Entities\Cash;
use Modules\User\Entities\User;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cash=Cash::all();
        $cash->load([
           'user'
        ]);
        return view('cash::Admin.index',compact('cash'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $user= User::all();
        return view('cash::Admin.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Cash::create([
            'user_id'=>$request->user_id,
            'price'=>$request->price,
            'status'=>$request->status,
            'serial_number'=>$request->serial_number


        ]);

        return redirect()->route('admin.cash.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('cash::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cash::edit');
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
