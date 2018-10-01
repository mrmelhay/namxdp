<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ app()->getLocale() }}">
@include('commons.meta')
<body class="site-navbar-small dashboard layout-boxed">
<!--[if lt IE 8]>
<p class="browserupgrade">Вы используюте <strong>устаревший</strong> браузер. Обновите <a href="http://browsehappy.com/">Ваш браузер</a> для лучшей работы сайта.</p>
<![endif]-->
@include('commons.navigation')
<div class="page">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            @yield('content')
        </div>
    </div>
</div>
@include('commons.footer')
@include('commons.scripts')
</body>
</html>