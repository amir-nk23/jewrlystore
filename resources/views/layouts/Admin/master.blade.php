<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content=" Administrator" />
    <meta name="author" content="Masoud Salehi" />
    <meta name="keyword" content="Bootstrap Data" />

    @livewireStyles


    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    @vite([
    'resources/admin/css/font-awesome.min.css',
    'resources/admin/css/simple-line-icons.css',
    'resources/admin/dest/style.css',
    'resources/admin/css/bootstrap.min.css',
        'resources/Front/css/bootstrap.rtl.min.css',
        'resources/Front/css/default.css',
    ])

        <link rel="stylesheet" href="{{asset('shamsi/persian-datepicker.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up"type="button">&#9776;</button>
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-left hidden-md-down">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">مدیر</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-xs-center">
                        <strong>تنظیمات</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> پروفایل</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> تنظیمات</a>
                    <!--<a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>-->
                    <div class="divider"></div>
                    <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> خروج</a>
                </div>
            </li>
        </ul>
    </div>
</header>
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link vw-100" href="{{route('admin.dashboard.index')}}"><i class="icon-speedometer"></i> داشبرد </a>
            </li>





            <li class="nav-title">
                کاربر
            </li>
            <li class="nav-item">
                <a class="nav-link vw-100" style="background-color:transparent" href="{{route('admin.user.index')}}"><i class=""></i>مدیریت کاربر</a>
            </li>




            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" style="padding-left:78px" href="#"><i class="icon-puzzle"></i> ثبت معامله</a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link"  style="background-color:transparent" href="{{route('admin.cash.create')}}"><i class="icon-puzzle"></i>ثبت معامله نقدی</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="background-color:transparent" href="{{route('admin.installment.create')}}"><i class="icon-puzzle"></i>ثبت معامله قسطی</a>
                    </li>
                </ul>
            </li>

                <li class="nav-title">
                    مدیریت معامله
                </li>
                <li class="nav-item">
                    <a class="nav-link vw-100" style="background-color:transparent" href="{{route('admin.installment.index')}}"><i class=""></i>لیست اقساط</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vw-100" style="background-color:transparent;" href="{{route('admin.cash.index')}}"><i class="icon-puzzle"></i>لیست پرداخت نقدی</a>
                </li>



            <li class="nav-item">
                <a class="nav-link vw-100" style="background-color:transparent" href="{{route('admin.product.index')}}"><i class=""></i>محصولات</a>
            </li>



            <li class="nav-title">
                گزارشات
            </li>
            <li class="nav-item">
                <a class="nav-link vw-100" style="background-color:transparent" href="{{route('admin.report.index')}}"><i class=""></i>گزارشات</a>
            </li>

            <li class="nav-title">
                اطلاعات پایه
            </li>
            <li class="nav-item">
                <a class="nav-link vw-100" style="background-color:transparent" href="{{route('admin.setting.index')}}"><i class=""></i>اطلاعات پایه</a>
            </li>



        </ul>
    </nav>
</div>

@yield('content')

<br><br><br>



{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        $('.select2').select2();--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        $('.js-example-basic-single').select2();--}}
{{--    });--}}
{{--</script>--}}


<script>

    function conertToToman(goalInput,GoalId){
        let txt=document.getElementById(goalInput)
        let txtValue= txt.value;
        const f = new Intl.NumberFormat('fa-IR', {
            style: 'currency',
            currency: 'IRR'
        });
        const number = parseFloat(txtValue);
        if (!isNaN(number)) {
            const formattedNumber = f.format(number);
            const formattedTomans = formattedNumber.replace(/ریال/g, 'تومان');
            // Display the formatted number in the "result" div
            let result = document.getElementById(GoalId);
            result.innerText =  formattedTomans;
        }
    }




    const f = new Intl.NumberFormat('es-us',{

    })

    console.log(f.format(number))
</script>




{{--<script src="{{ asset('vendor/alpine.js') }}"></script>--}}
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@livewireScripts
@vite([
{{--'resources/admin/js/libs/jquery.min.js',--}}
'resources/admin/js/libs/tether.min.js',
'resources/admin/js/libs/Chart.min.js',
'resources/admin/js/libs/bootstrap.min.js',
'resources/admin/js/libs/pace.min.js',
'resources/admin/js/app.js',
'resources/admin/js/views/main.js',
'resources/Front/js/bootstrap.bundle.min.js'
])

<script src="{{asset('shamsi/persian-date.js')}}"></script>
<script src="{{asset('shamsi/persian-datepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $('.observer-example').persianDatepicker({
        observer: true,
        format: 'YYYY/MM/DD',
        altField: '.observer-example-alt'
    });
</script>

<script>

    $(".js-example-theme-multiple").select2({
        theme: "classic"
    });

</script>

<script>

    const checkbox = document.getElementById('installment')
    const select = document.getElementById('i_status')
    checkbox.addEventListener('change',function (){

        if (this.checked){
            select.disabled=false;

        } else {

            select.disabled=true;
        }

    })

</script>



<script>
    $(document).ready(function() {
        // Add click event listener to radio buttons
        $('input[type=radio][name=cash]').on('click', function() {
            if ($(this).is(':checked')) {
                $(this).prop('checked', false);
            }
        });
    });
</script>


<script>
    document.getElementById('i_status').addEventListener('change', function() {
        var selectedOption = this.value;
        var anotherSelect = document.getElementById('installment_status');


        if (selectedOption === 'installment') {
            anotherSelect.disabled = false;

        } else {
            anotherSelect.disabled = true;

        }
    });
</script>




</body>

</html>
