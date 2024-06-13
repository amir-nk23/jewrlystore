<main class="main">


    <div>
        <div class="col-sm-2 float-none offset-1 mt-5">

            <label>نام مشتری : </label>
            <select class="form-control" name="customer" wire:model.live="customer">
                <option value="">همه</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->fullname}}</option>
                @endforeach

            </select>

        </div>
    </div>

    <div class="col-sm-6" style="margin-right:25%; margin-top: 90px">

        <table class="table">
            <thead>
            <tr>

                <th scope="col">ردیف</th>
                <th scope="col">نام و نام خانوادگی</th>
                <th scope="col">تاریخ</th>
                <th scope="col">وضعیت</th>

            </tr>
            </thead>
            <tbody>

            @foreach($reports as $report)

                @if($report->status=='قبل از سررسید')
                    <tr class="bg-warning">
                        <td>{{$loop->index+1}}</td>
                        <td>{{$report->user->fullname}}</td>
                        <td>{{\Carbon\Carbon::parse($report->date)->jdate('Y-m-d')}}</td>
                        <td>{{$report->status}}</td>
                    </tr>
                @endif

                @if($report->status=='زمانه سررسید')
                    <tr class="bg-success">
                        <td>{{$loop->index+1}}</td>
                        <td>{{$report->user->fullname}}</td>
                        <td>{{\Carbon\Carbon::parse($report->date)->jdate('Y-m-d')}}</td>
                        <td>{{$report->status}}</td>
                    </tr>
                @endif

                @if($report->status=='دیرکرد')
                    <tr class="bg-danger">
                        <td>{{$loop->index+1}}</td>
                        <td>{{$report->user->fullname}}</td>
                        <td>{{\Carbon\Carbon::parse($report->date)->jdate('Y-m-d')}}</td>
                        <td>{{$report->status}}</td>
                    </tr>
                @else


                @endif

                @if($report->status=='قسط بندی'||$report->status=='پرداخت نقدی')
                    <tr class="">
                        <td>{{$loop->index+1}}</td>
                        <td>{{$report->user->fullname}}</td>
                        <td>{{\Carbon\Carbon::parse($report->date)->jdate('Y-m-d')}}</td>
                        <td>{{$report->status}}</td>
                    </tr>
                @endif
            @endforeach

            </tbody>
        </table>

    </div>

</main>
