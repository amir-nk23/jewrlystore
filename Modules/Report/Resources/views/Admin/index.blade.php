@extends('layouts.Admin.master')

@section('content')

    <div class="main">

        <div class="col-sm-6 offset-3" style="margin-top:160px">


            <form action="{{route('admin.report.show')}}" method="get">



                <div class="col-sm-3">

                    <label>نام مشتری :</label>
                    <select name="user_name" class="js-example-theme-multiple form-control" name="state">


                        <option value="all">همه</option>
                        @foreach($users as $user)

                            <option value="{{$user->id}}">{{$user->fullname}}</option>

                        @endforeach

                    </select>

                </div>

                <div class="col-sm-2">

                    <label>تاریخ مبدا:</label>
                    <input  name="start_date" class="form-control observer-example" id="initial-value-example"/>

                </div>


                <div class="col-sm-2">

                    <label>تاریخ مقصد:</label>
                    <input  name="end_date" class="form-control observer-example" id="initial-value-example"/>

                </div>



                <div class="col-sm-2">

                    <label>وضعیت :</label>
                    <select name="status" class=" form-control" name="state">


                            <option value="all">همه</option>
                            <option value="زمانه سررسید">زمانه سررسید</option>
                            <option value="قبل از سررسید">قبل از سررسید</option>
                            <option value="با دیرکرد">با دیرکرد</option>
                            <option value="null">پرداخت نشده</option>

                    </select>

                </div>



                <div class="col-sm-2">

                    <label>وضعیت اقساط:</label>
                    <select disabled id="i_status" name="i_status" class=" form-control" name="state">


                        <option value="installment">اقساط</option>
                        <option value="notebook">ریز پرداختی</option>


                    </select>

                </div>

                <div class="col-sm-6">

                    <label>وضعیت اقساط:</label>
                    <select  id="installment_status" name="installment_status" class=" form-control" name="state">


                        <option value="all">همه</option>
                        <option value="پرداخت شده">پرداخت شده</option>
                        <option value="null">پرداخت نشده</option>

                    </select>

                </div>


                <div style="margin-left:25%" class="col-sm-6">


                    <div class="col-sm-3 mt-5">

                        <label>قسطی</label>
                        <input  type="checkbox" id="installment" value="installment" name="installment">
                    </div>


                    <div class="col-sm-3 mt-5">

                        <label>نقدی</label>
                        <input type="checkbox" value="cash" name="cash">
                    </div>

                </div>

            <div class="col-sm-12" dir="ltr">

                <button class="btn btn-primary p-3">فیلتر</button>
            </div>




            </form>


        </div>


    </div>

@endsection
