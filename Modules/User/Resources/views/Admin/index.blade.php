@extends('layouts.Admin.master')

@section('content')
<main class="main">


    <div class="col-sm-6" style="margin-right:25%; margin-top: 90px">

        <div>

            <a class="btn btn-success p-4 mb-3" href="{{route('admin.user.create')}}">ثبت مشتری</a>

        </div>


        <table class="table">
            <thead>
            <tr>

                <th scope="col">ردیف</th>
                <th scope="col">نام و نام خانوادگی</th>
                <th scope="col">تلفن همراه</th>
                <th scope="col">ادرس</th>


            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$user->fullname}}</td>
                <td>{{$user->mobile_number}}</td>
                <td>{{$user->address}}</td>
            </tr>

            @endforeach

            </tbody>
        </table>

    </div>

</main>

@endsection

