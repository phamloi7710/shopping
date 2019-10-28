<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ page_title()->getTitle() }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('fontawesome')}}">
        <link rel="stylesheet" href="{{asset('app-assets/plugins/ionicons/2.0.1/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('app-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('app-assets/dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/plugins/toastr/extensions/toastr.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/plugins/toastr/toastr.css')}}">
        <link href="{{asset('app-assets/plugins/google-fonts/sans-pro.css')}}" rel="stylesheet">
    </head>
    <body class="hold-transition {{$bodyClass ? $bodyClass : ''}}">
        @yield('content')
        <script src="{{asset('app-assets//plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('app-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('app-assets/dist/js/adminlte.min.js')}}"></script>
        <script src="{{asset('app-assets/plugins/toastr/toastr.min.js')}}" type="text/javascript"></script>
        @include('woo-commerce::admin.pages.auth.notify')
    </body>
</html>
