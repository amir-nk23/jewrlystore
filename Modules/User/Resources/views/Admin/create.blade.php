@extends('layouts.Admin.master')

@section('content')
    <div class="main">

        <div class="col-sm-6" style="margin-right:25%; margin-top: 90px">

        <form method="Post" action="{{route('admin.user.store')}}">


            @csrf
            <div class="form-group">

                <label>نام و نام خانوادگی :</label>
                <input type="text" name="fullname" class="form-control">

            </div>


            <div class="form-group">

                <label>شماره تلفن :</label>
                <input type="" name="mobile_number" class="form-control">

            </div>


            <div class="form-group">

                <label>پسوورد :</label>
                <input type="text" name="password" class="form-control">

            </div>


            <div class="form-group">

                <label>ادرس :</label>
                <input name="address" class="form-control">

            </div>

            <div class="form-group float-end mt-2">

              <button type="submit" class="btn btn-success p-3">ارسال</button>


            </div>
        </form>
    </div>

    </main>

@endsection

