<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="screen" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="screen" />


    <link rel="stylesheet" href="{{ asset('css/fontgoogleapis.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.w3.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toaster.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/maps/style.css.map') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/font-awesome.w3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendorcss/ti-icons/css/themify-icons.css') }}">






    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    <script src="{{ asset('js/toaster.min.js') }}"></script>
    <script src="{{ asset('graph/Chart.min.js') }}"></script>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/documentation.js') }}"></script>
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>

    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/tooltips.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/jquery.validation.min.js') }}"></script>
    <script src="{{ asset('js/additional.method.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('js/addproduct.js') }}"></script> --}}
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>



    {{-- <script type="module" src="{{ url('resources/js/app.js') }} "></script> --}}









    <title>@yield('title')</title>
</head>

<body class="">

    <div class="container-scroller">



        <livewire:managedashboard.layout.navbar />

        <div class="container-fluid page-body-wrapper">

            <livewire:managedashboard.layout.sidebar />

            {{-- @livewire('livewire.managedashboard.layout.sidebar') --}}

            @yield('content')

        </div>

    </div>



    {{-- @livewireScripts --}}
    @yield('page-script')
    <script src="{{ asset('js/template.js') }}"></script>
</body>

</html>