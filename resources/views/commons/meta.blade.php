<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! config('app.name', 'Laravel') !!}</title>
    <link rel="apple-touch-icon" href="{!! asset('assets/images/apple-touch-icon.png') !!}">
    <link rel="shortcut icon" href="{!! asset('assets/images/favicon.ico') !!} ">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
    <!-- Plugins -->
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/waves/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tokenfield/bootstrap-tokenfield.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/asrange/asRange.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/asspinner/asSpinner.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/clockpicker/clockpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/ascolorpicker/asColorPicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-touchspin/bootstrap-touchspin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/card/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-labelauty/jquery-labelauty.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jt-timepicker/jquery-timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-strength/jquery-strength.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/typeahead-js/typeahead.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forms/advanced.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/login-v2.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/7-stroke/7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/mfglabs/mfglabs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/open-iconic/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/themify/themify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/weather-icons/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/glyphicons/glyphicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/web-icons/web-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/octicons/octicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic&subset=latin,cyrillic'>
    <script src="https://unpkg.com/imask"></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{ asset('assets/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{ asset('assets/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
        Breakpoints();
    </script>
</head>
