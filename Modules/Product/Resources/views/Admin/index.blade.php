@extends('layouts.Admin.master')

@section('content')
    <main class="main">


        <div class="col-sm-8" style="margin-right:15%; margin-top: 90px">

            <div>

                <a class="btn btn-success p-4 mb-3" href="{{route('admin.product.create')}}">ثبت محصول</a>

            </div>


            <table class="table">
                <thead>
                <tr>

                    <th scope="col">ردیف</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">مقدار</th>
                    <th scope="col">عکس</th>




                </tr>
                </thead>
                <tbody>

                @foreach($product as $product)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->amount}}</td>
                        <td>{{$product->image}}</td>
                        <td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>

    </main>

@endsection
