


<main class="main">

    <!-- Button trigger modal -->

    <div style="display: {{$display_p}};margin-right: 35%" class="col-xs-3 card mt-2 shadow">

        <div  style="text-align: center;">
            <button wire:click="close"  style="margin-left: 270px; margin-top: 40px" class="btn-danger fa fa-times"></button>

        </div>


        <form class="justify-content-center" action="{{route('admin.notebook.update',$id)}}" method="post">

            @csrf
            @method('patch')
            <div class="form-group" style="text-align: center; margin-top: 70px;">
                <input disabled type="text" name="paid" class=" text-success font-2xl" value="{{number_format($pay)}}">
            </div>




            <div>

                <input hidden name="status" value="{{$status}}">

            </div>

            <div style="text-align: center">

                <button type="submit" class="btn btn-success">پرداخت</button>

            </div>

        </form>
    </div>

<!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="payment" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-header">
                <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>

            </div>
            <div class="modal-content">

                <form class="justify-content-center" action="{{route('admin.installmetn.payment',$id)}}" method="post">

                    @csrf
                    @method('patch')


                    <div class="form-group">
                        <input disabled type="text" name="paid"  class=" text-success font-2xl" value="{{number_format($checkout)}}">
                    </div>




                    <div>

                        <input hidden name="status" value="{{$status}}">

                    </div>

                    <div style="text-align: center">

                        <button type="submit" class="btn btn-success">پرداخت</button>

                    </div>

                </form>

            </div>
        </div>
    </div>







    {{--form--}}

    <div style="display:{{$display}};margin-right: 35%" class="col-xs-3 card mt-2 shadow" >


        <div  style="text-align: center;">
            <button wire:click="close_o"  style="margin-left: 270px; margin-top: 40px" class="btn-danger fa fa-times"></button>

        </div>

        <form class="justify-content-center" action="{{route('admin.installmetn.payment',$id)}}" method="post">

            @csrf
            @method('patch')


            <div class="form-group" style="text-align: center;margin-top: 70px">
                <input disabled type="text" name="paid"  class=" text-success font-2xl" value="{{number_format($checkout)}}">
            </div>




            <div>

                <input hidden name="status" value="{{$status}}">

            </div>

            <div style="text-align: center">

                <button type="submit" class="btn btn-success">پرداخت</button>

            </div>

        </form>
    </div>
    {{-- end form --}}




    <div class="col-sm-8" style="margin-right:15%; margin-top: 90px">




        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ماه</th>
                {{--                        <th scope="col">نام</th>--}}
                {{--                        <th scope="col">شماره چک</th>--}}
                <th scope="col">مبلغ قسط</th>
                <th scope="col">تاریخ سررسید</th>
                <th scope="col">مبلغ پرداختی</th>
                <th scope="col">تاریخ پرداخت</th>
                <th scope="col">میزان کارمزد</th>
                <th scope="col">دیرکرد</th>
                <th scope="col">وضعیت</th>
                <th scope="col">وضعیت پرداخت</th>
                <th scope="col">عملیات</th>


            </tr>
            </thead>
            <tbody>
            @foreach($list as $list)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    {{--                            <td>{{$list->installment_id}}</td>--}}
                    <td>{{number_format($list->price)}}</td>
                    <td>{{\Carbon\Carbon::parse($list->end_date)->jdate('Y-m-d')}}</td>
                    <td>{{$list->paid}}</td>
                    <td>{{$list->pay_date}}</td>
                    <td>{{$list->installment->profit*100/$list->installment->month}}%</td>
                    <td>{{$list->installment->delay*100}}%</td>
                    <td>
                        @if($list->status==0)
                            <span class="btn-danger">پرداخت نشده</span>
                        @endif

                        @if($list->status==1)
                            <span class="bg-success">پرداخت شده</span>
                        @endif
                    </td>

                    <td>{{$list->pay_status}}</td>
                    <td>


                        <BUTTON class="btn btn-success "   wire:click ="payment({{$list->id,}})" style="border-radius:10px" type="submit">پرداخت قسط</BUTTON>

                    </td>

                </tr>



                <tr>

                    <td style="text-align: center" colspan="4">

                    </td>

                </tr>

            @endforeach
            <tr>

                <td style="text-align: center" colspan="10">


                    <BUTTON class="btn btn-success font-2xl " wire:click.prevent ="calculatePrice({{$list->installment_id}})"  style="border-radius:10px" type="submit">پرداخت کل قسط</BUTTON>

                </td>

            </tr>


            </tbody>
        </table>





    </div>





</main>


