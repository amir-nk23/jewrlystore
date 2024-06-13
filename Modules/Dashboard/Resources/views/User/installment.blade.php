@extends('layouts.User.master')

@section('content')
    <main class="main">


        <div class="col-sm-9" style="margin-right:15%; margin-top: 90px">


            <table class="table">
                <thead>
                <tr>

                    <th scope="col">ردیف</th>
                    <th scope="col">نام و نام خانوادگی</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">شماره چک</th>
                    <th scope="col">بانک</th>
                    <th scope="col">قیمت محصول</th>
                    <th scope="col">پیش قسط</th>
                    <th scope="col">قیمت قسط</th>
                    <th scope="col">درصد دیرکرد</th>
                    <th scope="col">درصد کارمزد</th>
                    <th scope="col">تاریخ پایان قسط</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">عملیات</th>


                </tr>
                </thead>
                <tbody>

                @foreach($installment as $installment)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$installment->user->fullname}}</td>
                        <td>{{$installment->product->name}}</td>
                        <td>{{$installment->account_number}}</td>
                        <td>{{$installment->bank}}</td>
                        <td>{{number_format($installment->price)}}</td>
                        <td>{{number_format($installment->down_payment)}}</td>
                        <td>{{number_format($installment->installment_price)}}</td>
                        <td>{{$installment->delay*100}}%</td>
                        <td>{{$installment->profit*100}}%</td>
                        <td>{{\Carbon\Carbon::parse($installment->end_date)->jdate('Y-m-d')}}</td>
                        <td>
                            @if($installment->status==0)

                                <span class="bg-danger">پرداخت نشده</span>

                            @endif
                            @if($installment->status==1)

                                    <span class="bg-success">پرداخت شده</span>

                            @endif
                        </td>

                        <td><a class="btn btn-warning" href="{{route('user.dashboard.show',$installment->id)}}">ریزپرداختی ها</a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>

    </main>

@endsection

