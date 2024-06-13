@extends('layouts.Admin.master')

@section('content')
    <div class="main">

        <div class="col-sm-6" style="margin-right:25%; margin-top: 90px">

            <form method="Post" action="{{route('admin.cash.store')}}">


                @csrf
                <div class="form-group">

                    <label>نام و نام خانوادگی :</label>
                    <select class="form-control" name="user_id">

                        @foreach($user as $user)
                            <option value="{{$user->id}}">{{$user->fullname}}</option>
                        @endforeach

                    </select>


                </div>


                <div class="form-group">

                    <label>قیمت :</label>
                    <input type="number" id="txt" oninput="conertToToman('txt','result')" name="price" class="form-control">

                    <div style="text-align: left" id="result">



                    </div>
                </div>


                <div class="form-group">

                    <label>نحوه پرداخت :</label>
                    <select name="status" class="form-control">

                        <option>نقدی</option>
                        <option>کارت</option>

                    </select>

                </div>


                <div class="form-group">

                    <label>شماره فیش :</label>
                    <input name="serial_number" class="form-control">

                </div>

                <div class="form-group float-end mt-2">

                    <button type="submit" class="btn btn-success p-3">ارسال</button>


                </div>
            </form>
        </div>

        </main>

@endsection


