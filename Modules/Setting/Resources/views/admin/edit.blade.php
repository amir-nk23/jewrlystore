@extends('layouts.Admin.master')

@section('content')
    <div class="main">

        <div class="col-sm-6" style="margin-right:25%; margin-top: 90px">

            <form method="Post" action="{{route('admin.setting.update',$setting->id)}}">

                @method('patch')
                @csrf
                <div class="form-group">

                    <label>نام و نام خانوادگی :</label>
                   <input name="fullname" value="{{$setting->fullname}}" type="text" class="form-control">


                </div>


                <div class="form-group">

                    <label>اسم مغازه:</label>
                    <input type="text"   value="{{$setting->shop_name}}" name="shop_name" class="form-control">


                </div>


                <div class="form-group">

                    <label>سود :</label>
                    <input name="profit" type="number" value="{{$setting->profit*100}}" class="form-control">

                </div>


                <div class="form-group">

                    <label>ماه :</label>
                    <input type="number" name="month" value="{{$setting->month}}" class="form-control">

                </div>

                <div class="form-group float-end mt-2">

                    <button type="submit" class="btn btn-success p-3">ارسال</button>


                </div>
            </form>
        </div>

        </main>

@endsection

