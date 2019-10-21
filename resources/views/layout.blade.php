<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'qualitybook-liqi')</title>
    <link href="{{ asset('img/logo.png')  }}" rel="SHORTCUT ICON"/>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href={{ asset('fonts/ionicons.min.css') }}>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @yield('extra-css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
@include('partials.nav')

@yield('content')

@include('partials.footer')

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>

@yield('extra-js')

</body>
</html>

