<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="{{Cache::get('businessSetting')->where('key' , 'meta_keywords')->first()->value}}" name="keywords">
    <meta content="{{Cache::get('businessSetting')->where('key' , 'meta_description')->first()->value}}" name="description">
    <meta name="og:title" property="og:title" content="{{Cache::get('businessSetting')->where('key' , 'og_title')->first()->value}}">
    <meta name="og:type" property="og:type" content="{{Cache::get('businessSetting')->where('key' , 'og_type')->first()->value}}">
    <meta name="og:descreption" property="og:descreption" content="{{Cache::get('businessSetting')->where('key' , 'og_descreption')->first()->value}}">
    <meta name="og:image" property="og:image" content="{{ asset('assets/dist_3/assets/images/logo.png') }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Favicon -->
    <link href="{{ asset('assets/dist_1/img/favicon.ico') }}" rel="icon">
    <link rel="shortcut icon" href="{{ asset('assets/dist_3/assets/images/header-logo.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/dist_1/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist_1/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/dist_1/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/dist_1/css/style.css') }}" rel="stylesheet">
    @notifyCss
    <style>
        .notify {
            margin-top: 80px;
            z-index: 1;
        }
    </style>
    @stack('css')
</head>


<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @include('layouts.front.header')
        @yield('content')
        {{-- @include('layouts.front.footer') --}}


    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/dist_1/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/dist_1/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/dist_1/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/dist_1/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <x:notify-messages />
    @notifyJs
    <!-- Template Javascript -->
    <script src="{{ asset('assets/dist_1/js/main.js') }}"></script>
    @stack('js')
</body>

</html>
