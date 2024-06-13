@extends('layouts.Admin.master')

@section('content')
    <main class="main">


        <div class="col-sm-8" style="margin-right:15%; margin-top: 90px">



            <table class="table">
                <thead>
                <tr>

                    <th scope="col">ردیف</th>
                    <th scope="col">نام و نام خانوادگی</th>
                    <th scope="col">اسم مغازه</th>
                    <th scope="col">درصد سود</th>
                    <th scope="col">ماه</th>
                    <th scope="col">عملیات</th>


                </tr>
                </thead>
                <tbody>

                @foreach($setting as $setting)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$setting->fullname}}</td>
                        <td>{{$setting->shop_name}}</td>
                        <td>{{$setting->profit*100}}%</td>
                        <td>{{$setting->month}}</td>
                        <td><a href="{{route('admin.setting.edit',$setting->id)}}"><img class="btn btn-info" style="height:45px" src="{{asset('svgs/icons8-pencil-drawing-48.png')}}" alt="edit"></a></td>

                @endforeach

                </tbody>
            </table>

        </div>

    </main>

@endsection
