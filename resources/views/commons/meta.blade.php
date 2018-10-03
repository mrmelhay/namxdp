<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! config('app.name', 'Laravel') !!}</title>
    <link rel="apple-touch-icon" href="{!! asset('images/apple-touch-icon.png') !!}">
    <link rel="shortcut icon" href="{!! asset('images/favicon.ico') !!} ">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.min.css') }}">
    <!-- Plugins -->
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/waves/waves.css') }}">
    <link rel="stylesheet" href="{{asset('vendor/chartist-js/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('css/charts/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('css/widgets/chart.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-tokenfield/bootstrap-tokenfield.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/asrange/asRange.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/asspinner/asSpinner.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/clockpicker/clockpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/ascolorpicker/asColorPicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-touchspin/bootstrap-touchspin.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/card/card.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-labelauty/jquery-labelauty.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-maxlength/bootstrap-maxlength.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jt-timepicker/jquery-timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-strength/jquery-strength.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/multi-select/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/typeahead-js/typeahead.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forms/advanced.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/login-v2.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/7-stroke/7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/ionicons/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/mfglabs/mfglabs.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/open-iconic/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/themify/themify.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/weather-icons/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/glyphicons/glyphicons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/web-icons/web-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/octicons/octicons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/brand-icons/brand-icons.min.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic&subset=latin,cyrillic'>
    <script src="https://unpkg.com/imask"></script>
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
