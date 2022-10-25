<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
<title>@yield('title') - {{ config('app.name') }}</title>
<meta name="description" content="@yield('meta_description', config('app.name'))">
<meta name="author" content="@yield('meta_author', config('app.name'))">

@yield('meta')
@stack('before-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
@stack('after-styles')
@if (trim($__env->yieldContent('page-styles')))
@yield('page-styles')
@endif

<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/theme1.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-steps/jquery.steps.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/parsleyjs/css/parsley.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<script type="text/javascript" src="{{ asset('assets/js/clothingMeasurement.js') }}"></script>
</head>

<body class="font-montserrat">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">


    @include('user.layouts.sidebar')
    @include('user.layouts.headertop')

    <div class="page">
        @include('user.layouts.page_header')

        <main>
            {{ $slot }}
        </main>

        {{-- @include('officials.layout.footer') --}}
    </div>
</div>


@yield('popup')

<!-- Scripts -->
@stack('before-scripts')
<script src="{{ asset('assets/bundles/lib.vendor.bundle.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}


@stack('after-scripts')
{{-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> --}}
@if (trim($__env->yieldContent('page-script')))

@yield('page-script')
@endif

</body>
</html>
