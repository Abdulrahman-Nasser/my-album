<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />


    <!-- Css -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/mycss/main.css') }}">

</head>

<body>
    <div id="app">

        <main class="">
            @yield('content')
        </main>

    </div>


    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    {{-- jquery file to move images --}}
    <script src="{{asset('dist/js/moving_images/file.js')}}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    {{-- filepond js --}}
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>

    @yield('scripts')

    @yield('jquery')
</body>

</html>
