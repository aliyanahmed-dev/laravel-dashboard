<!DOCTYPE html>
<html etc="{{ app()->getLocale() }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ (str_replace('_', '-', app()->getLocale()) == 'fa') || (str_replace('_', '-', app()->getLocale()) == 'ar') ? "dir=rtl" : "dir=ltr" }}>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Laravel Template</title>
    <meta name="author" content="">
    <meta name="description" content="Laravel Template">
    <meta name="keywords" content="Laravel Template">

    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    @include('layouts.links')
    @yield('css')
    @php
    $color1 = $setting["color"];
    $color2 = $setting["color_2"];
    $color3 = $setting["color_3"];
    @endphp
    <style>
        :root {
            --theme-color: @php echo $color1 @endphp;
            --theme-color2: @php echo $color2 @endphp;
            --theme-color3: @php echo $color3 @endphp;
        }
    </style>
</head>

<body class="{{ $body_class ?? ''}}">

    @include('layouts.header')

    @php
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
    @endphp

    @if($currentRoute == 'home')
    <!--==============================
     Preloader
  ==============================-->
    <!-- <div class="preloader ">
        <div class="preloader-inner">
            <span class="loader"></span>
        </div>
    </div> -->


    @endif

    @yield('content')
    @include('layouts.footer')



    @include('layouts.scripts')
    @yield('script')

    <script>
        $(document).ready(function() {
            $("p[data-f-id='pbf']").hide();
        });
    </script>

    @if(Session::has('notify_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ Session::get('notify_success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ Session::get('error') }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
    @endif


</body>

</html>