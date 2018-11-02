<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name','Laravel') }} | @yield('title', '')</title>

        <link rel="shortcut icon" href="/favicon_3.ico" type="image/x-icon">
        <link rel="icon" href="/favicon_3.ico" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('store/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('store/css/responsive.css') }}">

        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')">
    @include('partes.nav')

    @yield('content')

    @include('partes.footer')

    @yield('extra-js')

</body>
</html>



