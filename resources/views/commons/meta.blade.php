<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! config('app.name', 'Laravel') !!}</title>

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
