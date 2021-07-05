<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{asset('css/libs/bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/fontawesome.min.css')}}" rel="stylesheet">
    

    @yield('styles')

</head>
<body class="bg-gradient-primary">
    @yield('content')
    
    <!-- Scripts -->
    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/libs/sb-admin-2.min.js') }}"></script>

    @yield('footer')
</body>
</html>
