@extends('layouts.Admin.master')

@section('content')
    <main class="main">


      @if($query !=null)

        <div class="col-sm-9" style="margin-right:15%; margin-top: 90px">

            <div style="text-align: center">

                <div class="mb-3"> <h2>پرداخت های قسطی</h2> </div>

            </div>

            <table class="table">
                <thead>
                <tr>

                    <th scope="col">ردیف</th>
                    <th scope="col">نام و نام خانوادگی</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">شماره چک</th>
                    <th scope="col">بانک</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">مبلغ پیش پرداخت</th>
                    <th scope="col">درصد دیرکرد</th>
                    <th scope="col">سود</th>
                    <th scope="col">ماه</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">زمان شروع قسط</th>
                    <th scope="col">زمان پایان قسط</th>
                    <th scope="col">مبلغ پرداخت شده</th>
                </tr>
                </thead>
                <tbody>
                @foreach($query as $query)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$query->user->fullname}}</td>
                        <td>{{$query->product->name}}</td>
                        <td>{{$query->account_number}}</td>
                        <td>{{$query->bank}}</td>
                        <td>{{number_format($query->price)}}</td>
                        <td>{{number_format($query->down_payment)}}</td>
                        <td>{{$query->delay*100}}%</td>
                        <td>{{$query->profit*100}}%</td>
                        <td>{{$query->month}}</td>
                        <td>{{$query->status}}</td>
                       <td>{{\Carbon\Carbon::parse($query->start_date)->jdate('Y-m-d')}}</td>
                        <td>{{\Carbon\Carbon::parse($query->end_date)->jdate('Y-m-d')}}</td>
                        <td>{{$query->paid}}</td>

                    </tr>


                @endforeach



                </tbody>
            </table>
            @endif


            @if($query_en !=null)

                <div class="col-sm-9" style="margin-right:15%; margin-top: 90px">

                    <div style="text-align: center">

                        <div class="mb-3"> <h2>ریز پرداخت های قسطی</h2> </div>

                    </div>

                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">ردیف</th>
                            <th scope="col">نام و نام خانوادگی</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">درصد دیرکرد</th>
                            <th scope="col">سود</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">زمان شروع قسط</th>
                            <th scope="col">زمان پایان قسط</th>
                            <th scope="col">مبلغ پرداخت شده</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($query_en as $query_o)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$query_o->installment->user->fullname}}</td>
                                <td>{{number_format($query_o->price)}}</td>
                                <td>{{$query_o->installment->delay*100}}%</td>
                                <td>{{$query_o->installment->profit*100}}%</td>
                                @if($query_o->status == 0)
                                    <td><span class="btn btn-danger">پرداخت نشده</span></td>
                                @endif
                                @if($query_o->status == 1)
                                    <td><span class="btn btn-success">پرداخت شده</span></td>
                                @endif
                                <td>{{\Carbon\Carbon::parse($query_o->start_date)->jdate('Y-m-d')}}</td>
                                <td>{{\Carbon\Carbon::parse($query_o->end_date)->jdate('Y-m-d')}}</td>
                                <td>{{$query_o->paid}}</td>


                            </tr>


                        @endforeach



                        </tbody>
                    </table>
                    @endif
        </div>





                @if($P_query !=null)

                    <div class="col-sm-9" style="margin-right:15%; margin-top: 90px">

                        <div style="text-align: center">

                            <div class="mb-3"> <h2>پرداخت های نقدی</h2> </div>

                        </div>

                        <table class="table">
                            <thead>
                            <tr>

                                <th scope="col">ردیف</th>
                                <th scope="col">نام و نام خانوادگی</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">شماره فیش</th>
                                <th scope="col">تاریخ خرید</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($P_query as $query_p)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$query_p->user->fullname}}</td>
                                    <td>{{number_format($query_p->price)}}</td>
                                    @if($query_p->status == 0)
                                        <td><span class="btn btn-danger">پرداخت نشده</span></td>
                                    @endif
                                    @if($query_p->status == 1)
                                        <td><span class="btn btn-success">پرداخت شده</span></td>
                                    @endif

                                    <td>{{$query_p->serial_number}}</td>
                                    <td>{{\Carbon\Carbon::parse($query_p->created_at)->jdate('Y-m-d')}}</td>



                                </tr>


                            @endforeach



                            </tbody>
                        </table>

                        @endif







                        <table class="table">


                            <thead>
                            <tr>


                                <th scope="col">جمع کل پرداختی ها</th>
                                <th scope="col">جمع کل بدهی</th>



                            </tr>
                            </thead>

                            <div style="text-align: center">

                                <div class="mb-3"> <h2>جمع کل</h2> </div>


                            </div>


                            <tbody>

                            <tr>

                                @if($query_en!=null && $P_query!=null)
                                <td>{{number_format($query_en->sum('paid')+$P_query->sum('price'))}}</td>
                                    <td>{{number_format($query_en->where('status',0)->sum('price'))}}</td>


                                @endif

                                @if($query!=null && $P_query!=null )
                                        <td>{{number_format($query->sum('paid')+$P_query->sum('price'))}}</td>

                                    @endif

                                    @if($query!=null && $P_query==null )
                                        <td>{{number_format($query->sum('paid'))}}</td>
                                    @endif
                                    @if($query_en!=null && $P_query==null)
                                        <td>{{number_format($query_en->sum('paid'))}}</td>
                                        <td>{{number_format($query_en->where('status',0)->sum('price'))}}</td>
                                    @endif

                                    @if($P_query!=null && $query==null && $query_en==null )
                                        <td>{{number_format($P_query->sum('price'))}}</td>
                                    @endif

                            </tr>



                            </tbody>
                        </table>



                    </div>

        </div>

    </main>

@endsection
