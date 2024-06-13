@extends('layouts.Admin.master')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="#">مدیریت</a>
            </li>
            <li class="breadcrumb-item active">داشبرد</li>

            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                    <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;داشبرد</a>
                    <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;تنظیمات</a>
                </div>
            </li>
        </ol>

        <div class="container-fluid ">

{{--            <div class="animated fadeIn">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-6 col-lg-3">--}}
{{--                        <div class="card card-inverse card-primary">--}}
{{--                            <div class="card-block p-b-0">--}}
{{--                                <div class="btn-group pull-left">--}}
{{--                                    <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        <i class="icon-settings"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h4 class="m-b-0">9.823</h4>--}}
{{--                                <p>کاربر آنلاین</p>--}}
{{--                            </div>--}}
{{--                            <div class="chart-wrapper p-x-1" style="height:70px;">--}}
{{--                                <canvas id="card-chart1" class="chart" height="70"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--/col-->--}}

{{--                    <div class="col-sm-6 col-lg-3">--}}
{{--                        <div class="card card-inverse card-info">--}}
{{--                            <div class="card-block p-b-0">--}}
{{--                                <button type="button" class="btn btn-transparent active p-a-0 pull-left">--}}
{{--                                    <i class="icon-location-pin"></i>--}}
{{--                                </button>--}}
{{--                                <h4 class="m-b-0">9.823</h4>--}}
{{--                                <p>کاربر آنلاین</p>--}}
{{--                            </div>--}}
{{--                            <div class="chart-wrapper p-x-1" style="height:70px;">--}}
{{--                                <canvas id="card-chart2" class="chart" height="70"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--/col-->--}}

{{--                    <div class="col-sm-6 col-lg-3">--}}
{{--                        <div class="card card-inverse card-warning">--}}
{{--                            <div class="card-block p-b-0">--}}
{{--                                <div class="btn-group pull-left">--}}
{{--                                    <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        <i class="icon-settings"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h4 class="m-b-0">9.823</h4>--}}
{{--                                <p>کاربر آنلاین</p>--}}
{{--                            </div>--}}
{{--                            <div class="chart-wrapper" style="height:70px;">--}}
{{--                                <canvas id="card-chart3" class="chart" height="70"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--/col-->--}}

{{--                    <div class="col-sm-6 col-lg-3">--}}
{{--                        <div class="card card-inverse card-danger">--}}
{{--                            <div class="card-block p-b-0">--}}
{{--                                <div class="btn-group pull-left">--}}
{{--                                    <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        <i class="icon-settings"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h4 class="m-b-0">9.823</h4>--}}
{{--                                <p>کاربر آنلاین</p>--}}
{{--                            </div>--}}
{{--                            <div class="chart-wrapper p-x-1" style="height:70px;">--}}
{{--                                <canvas id="card-chart4" class="chart" height="70"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--/col-->--}}

{{--                </div>--}}
{{--                <!--/row-->--}}
{{--            </div>--}}


            <div  class="card col-sm-4  widget-flat bg-success" style="width: 20%">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon bg-primary-lighten rounded-circle text-primary"></i>
                    </div>
                    <h5 class="text-light fw-normal mt-0" title="Revenue">فروش قسطی</h5>
                    <h3 class="mt-3 mb-3 text-white">{{number_format($i_sum)}}T</h3>
                    <p class="mb-0 text-light">
            <span class="badge badge-info mr-1">
                        <span class="text-nowrap">از اول ماه</span>
                    </p>
                </div>
            </div>


            <div  class="card col-sm-4  widget-flat bg-primary" style="width: 20%;margin-right: 15%">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon bg-primary-lighten rounded-circle text-primary"></i>
                    </div>
                    <h5 class="text-light fw-normal mt-0" title="Revenue">فروش نقدی</h5>
                    <h3 class="mt-3 mb-3 text-white">{{number_format($c_sum)}}T</h3>
                    <p class="mb-0 text-light">
            <span class="badge badge-info mr-1">
                        <span class="text-nowrap">از اول ماه</span>
                    </p>
                </div>
            </div>



            <div  class="card col-sm-4  widget-flat bg-danger" style="width: 20%;margin-right: 15%">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon bg-primary-lighten rounded-circle text-primary"></i>
                    </div>
                    <h5 class="text-light fw-normal mt-0" title="Revenue">کل فروش</h5>
                    <h3 class="mt-3 mb-3 text-white">{{number_format($sum)}}T</h3>
                    <p class="mb-0 text-light">
            <span class="badge badge-info mr-1">
                        <span class="text-nowrap">از اول ماه</span>
                    </p>
                </div>
            </div>

        </div>
        <!--/.container-fluid-->

        <div class="" style="margin-top: 100px">

            <hr class="col-sm-8 offset-2" style="
    border: 0;
    height: 2px;
    background: green;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
" >

        </div>

<div class="" style="text-align: center;">

    <p class="fw-bold font-2xl">گزارشات :</p>

</div>
        <div class="col-sm-6 offset-3" style="margin-top: 80px;">


            @foreach($notebook as $notebook)

                @if(\Carbon\Carbon::today()>=\Carbon\Carbon::parse($notebook->end_date))
                <p style="text-align: center" class="alert alert-danger">مشتری {{$notebook->installment->user->fullname}} قسط خود را در تاریخ {{\Carbon\Carbon::parse($notebook->end_date)->jdate('d-m-Y')}} پرداخت نکرده است </p>
                @endif
            @endforeach
        </div>
    </main>

@endsection
