<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Al Ehsan Media</title>
  <link rel="icon" type="image/x-icon" href="{{asset('frontend/assets/img/favicon.png')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"  />

  <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  
  @livewireStyles
</head>

<body>
    @include('frontend.includes.header')
    
    @yield('content')

    @include('frontend.includes.footer')

    @yield('script_code')

    @livewireScripts
</body>
</html>
