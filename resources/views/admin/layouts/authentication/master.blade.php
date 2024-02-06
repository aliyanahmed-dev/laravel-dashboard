<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <!-- <link rel="icon" href="{{asset('assets/admin/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.png')}}" type="image/x-icon"> -->
     <title>Modest - Admin</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     @php
  $color = $setting["color_4"];
  @endphp

  
    @include('admin.layouts.authentication.css')
    @yield('style') 
          <style>
      
    :root {
      --theme-deafult: @php echo $color @endphp;
      --theme-secondary: @php echo $color @endphp;
    }
  </style>
  </head>
  <body>
    <!-- login page start-->
    @yield('content')  
    <!-- latest jquery-->
    @include('admin.layouts.authentication.script') 
  </body>
</html>