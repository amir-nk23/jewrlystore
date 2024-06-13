@extends('layouts.Admin.master')

@section('content')
    <main class="main">


        <div class="col-xs-6 offset-3 mt-5">

            <form class=""  method="post" action="{{route('admin.product.store')}}">

                @csrf
                <div class="form-group">
                    <label>نام محصول :</label>
                    <input type="text" name="name" class="form-control">

                </div>


                <div class="form-group">

                    <label>تعداد :</label>
                    <input type="number" name="amount" class="form-control">

                </div>

                <div class="form-group float-end mt-3">

                    <button class="btn btn-success p-3" type="submit">ثبت</button>

                </div>

            </form>


        </div>

    </main>


@endsection
