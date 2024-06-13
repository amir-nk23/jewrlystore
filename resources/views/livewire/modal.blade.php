<!-- Modal -->


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

    <div>

        <input hidden name="id" value="{{$id}}">

    </div>


    <div style="text-align: center">

        <button type="submit" class="btn btn-success">پرداخت</button>

    </div>

</form>
</div>
