@extends('layouts.Admin.master')

@section('content')
<main class="main">


    <div class="col-sm-6" style="margin-right:25%; margin-top: 90px">

        <table class="table">
            <thead>
            <tr>

                <th scope="col">ردیف</th>
                <th scope="col">نام و نام خانوادگی</th>
                <th scope="col">قیمت</th>
                <th scope="col">شماره فیش</th>
                <th scope="col">تاریخ</th>
                <th scope="col">وضعیت پرداخت</th>


            </tr>
            </thead>
            <tbody>

            @foreach($cash as $cash)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$cash->user->fullname}}</td>
                <td>{{$cash->price}}</td>
                <td>{{$cash->serial_number}}</td>
                <td>{{\Carbon\Carbon::parse($cash->created_at)->jdate('Y-m-d')}}</td>
                <td>{{$cash->status}}</td>
            </tr>

            @endforeach

            </tbody>
        </table>

    </div>

</main>

@endsection

