<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="screen" />

    <link rel="stylesheet" href="{{ asset('css/fontgoogleapis.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.w3.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script scr="{{ asset('js/jquery.validation.min.js') }}"></script>



    <title>@yield('title')</title>
</head>

<body>
    @include('users.layouts.header')

    @yield('content')

    @include('users.layouts.footer')

    @yield('page-script')
</body>

</html>
