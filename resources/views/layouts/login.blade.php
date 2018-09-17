<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ app()->getLocale() }}">
@include('commons.meta')
<body class="page-login-v2 layout-full page-dark">

<!--[if lt IE 8]>
<p class="browserupgrade">Вы используюте <strong>устаревший</strong> браузер. Обновите <a href="http://browsehappy.com/">Ваш браузер</a> для лучшей работы сайта.</p>
<![endif]-->
@yield('content')
@include('commons.scripts')
</body>
</html>
