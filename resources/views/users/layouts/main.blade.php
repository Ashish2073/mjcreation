<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="screen" />

    <link rel="stylesheet" href="{{ asset('css/fontgoogleapis.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.w3.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toaster.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />



    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.validation.min.js') }}"></script>
    <script src="{{ asset('js/toaster.min.js') }}"></script>
    {{-- <script src="{{ Vite::asset('resources/js/app.js') }} "></script> --}}



    <title>@yield('title')</title>
</head>

<body>

    @include('users.layouts.header')

    @yield('content')

    @include('users.layouts.footer')
    @livewireScripts
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
    @yield('page-script')
</body>

</html>
