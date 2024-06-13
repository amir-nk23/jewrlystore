@extends('layouts.Admin.master')

@section('content')
    <main class="main">

            <form class="" style="margin-top: 40px" method="post" action="{{route('admin.installment.store')}}">

                @csrf
                <div class="col-xs-6">


                    <div  class="form-group">

                        <label>نام مشتری :</label>
                       <select class="form-control" id="#user" name="user_id">

                           @foreach($user as $user)

                               <option value="{{$user->id}}">{{$user->fullname}}</option>

                           @endforeach


                       </select>

                    </div>

                    <div class="form-group ">

                        <label>اسم محصول :</label>
                        <select class="form-control" id="#user" name="product_name">

                            @foreach($product as $product)

                                <option value="{{$product->id}}">{{$product-> name}}</option>

                            @endforeach


                        </select>

                    </div>

                    <div class="form-group">

                        <label>شماره چک :</label>

                        <input type="text"  class="form-control" name="account_number">

                    </div>

                    <div class="form-group">

                        <label>نام بانک :</label>
                        <input type="text"  class="form-control" name="bank">

                    </div>


                </div>

                <div class="col-xs-6">


                    <div class="col-xs-12">


                        <div class="form-group col-xs-3 d-block">

                            <label>قیمت محصول :</label>
                            <input  type="number" id="txt" oninput="conertToToman('txt','result')" wire:model="price"  class="form-control col-xs-4" name="price">
                            <div id="result">


                            </div>
                        </div>

                    </div>


                    <div class="col-xs-12">

                        <div class="form-group col-xs-3 clearfix">

                            <label>پیش قسط :</label>
                                <input type="number" id="down_payment" oninput="conertToToman('down_payment','d_result')"  class="form-control" name="down_payment">

                                <div id="d_result">


                                </div>
                        </div>
                    </div>

                <div class="col-xs-12">

                    <div class="form-group col-xs-3 clearfix">

                        <label>درصد دیرکرد:</label>
                        <input type="number"  class="form-control" name="delay">

                    </div>

                </div>


                    <div class="col-xs-12">

                        <div class="form-group col-xs-3 clearfix">

                            <label>ماه:</label>
                            <input type="number"  class="form-control" name="month">

                        </div>

                    </div>

                    <div class="form-group col-xs-6">
                        <label>جنس دریافتی(درصورت نداشتن چک) :</label>
                        <input type="text"  class="form-control" name="exchange">
                    </div>



                </div>


                <div class="col-xs-12 mt-2" style="text-align: center ">

                    <button type="submit" class="btn btn-success px-4 py-3">ارسال</button>

                </div>


            </form>
    </main>


@endsection
