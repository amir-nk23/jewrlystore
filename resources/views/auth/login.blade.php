@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center col-sm-4" style="margin-left: 30%;">


                <div class="card-body">
                    <form method="POST" dir="rtl" action="{{ route('login') }}">
                        @csrf

                        <body class="hold-transition login-page">
                        <div class="login-box">

                            <!-- /.login-logo -->
                            <div class="card">
                                <div class="card-body login-card-body">
                                    <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

                                    <form action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" name="fullname" class="form-control" placeholder="نام و نام خانوادگی">
                                            <div class="input-group-append">
                                                <span class="fa fa-envelope input-group-text"></span>
                                            </div>
                                        </div>
                                        @if($errors->has('fullname'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="رمز عبور">
                                            <div class="input-group-append">
                                                <span class="fa fa-lock input-group-text"></span>
                                            </div>
                                        </div>

                                        @if($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif

                                        <div class="row">
                                            <div class="col-8">
                                                <div class="checkbox icheck">
                                                    <label>
                                                        <input type="checkbox"> یاد آوری من
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>

                                    <!-- /.social-auth-links -->

                                </div>
                                <!-- /.login-card-body -->
                            </div>
                        </div>
                        <!-- /.login-box -->
@endsection
