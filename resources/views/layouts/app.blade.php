<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.min.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/waves/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/login-v2.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic&subset=latin,cyrillic'>
    <!--[if lt IE 9]>
    <script src="{{ asset('vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{ asset('vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('vendor/respond/respond.min.js') }}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{ asset('vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{ asset('vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="@if (Auth::guest())  page-login-v2 layout-full page-dark @else site-navbar-small dashboard @endif ">

<!--[if lt IE 8]>
<p class="browserupgrade">Вы используюте <strong>устаревший</strong> браузер. Обновите <a href="http://browsehappy.com/">Ваш браузер</a> для лучшей работы сайта.</p>
<![endif]-->

        @yield('nav')
        @yield('content')
        @yield('footer')


<script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/animsition/animsition.js') }}"></script>
<script src="{{ asset('vendor/asscroll/jquery-asScroll.js') }}"></script>
<script src="{{ asset('vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('vendor/asscrollable/jquery.asScrollable.all.js') }}"></script>
<script src="{{ asset('vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
<script src="{{ asset('vendor/waves/waves.js') }}"></script>
<!-- Plugins -->
<script src="{{ asset('vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('vendor/slidepanel/jquery-slidePanel.js') }}"></script>
<script src="{{ asset('vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('js/core.js') }}"></script>
<script src="{{ asset('js/site.js') }}"></script>
<script src="{{ asset('js/sections/menu.js') }}"></script>
<script src="{{ asset('js/sections/menubar.js') }}"></script>
<script src="{{ asset('js/sections/sidebar.js') }}"></script>
<script src="{{ asset('js/configs/config-colors.js') }}"></script>
<script src="{{ asset('js/configs/config-tour.js') }}"></script>
<script src="{{ asset('js/components/asscrollable.js') }}"></script>
<script src="{{ asset('js/components/animsition.js') }}"></script>
<script src="{{ asset('js/components/slidepanel.js') }}"></script>
<script src="{{ asset('js/components/switchery.js') }}"></script>
<script src="{{ asset('js/components/tabs.js') }}"></script>
<script src="{{ asset('js/components/jquery-placeholder.js') }}"></script>
<script src="{{ asset('js/components/material.js') }}"></script>
<script>
    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>
