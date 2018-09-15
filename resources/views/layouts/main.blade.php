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
<body class="@if (!route("home"))  page-login-v2 layout-full page-dark @else site-navbar-small dashboard layout-boxed @endif ">

<!--[if lt IE 8]>
<p class="browserupgrade">Вы используюте <strong>устаревший</strong> браузер. Обновите <a href="http://browsehappy.com/">Ваш браузер</a> для лучшей работы сайта.</p>
<![endif]-->
@section('nav')
    <nav class="site-navbar navbar navbar-inverse navbar-fixed-top navbar-mega navbar-inverse"
         role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                    data-toggle="menubar">
                <span class="sr-only">Переключить Навигацию</span>
                <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                    data-toggle="collapse">
                <i class="icon md-more" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand navbar-brand-center" href="index.html">
                <img class="navbar-brand-logo navbar-brand-logo-normal" src="images/logo.png"
                     title="Material">
                <img class="navbar-brand-logo navbar-brand-logo-special" src="images/logo-blue.png"
                     title="Material">
                <span class="navbar-brand-text hidden-xs"> Material</span>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                    data-toggle="collapse">
                <span class="sr-only">Переключить Поиск</span>
                <i class="icon md-search" aria-hidden="true"></i>
            </button>
        </div>
        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->

                <!-- End Navbar Toolbar -->
                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
                           aria-expanded="false" role="button">
                            <span class="flag-icon flag-icon-ru"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-ru"></span> Русский</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-fr"></span> French</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-cn"></span> Chinese</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-de"></span> German</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem">
                                    <span class="flag-icon flag-icon-nl"></span> Dutch</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                           data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="{{ asset('images/5.jpg') }}" alt="...">
                <i></i>
              </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Профиль</a>
                            </li>

                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Созлама</a>
                            </li>
                            <li class="divider" role="presentation"></li>
                            <li role="presentation">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Чиқиш</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                           data-animation="scale-up" role="button">
                            <i class="icon md-notifications" aria-hidden="true"></i>
                            <span class="badge badge-danger up">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                            <li class="dropdown-menu-header" role="presentation">
                                <h5>УВЕДОМЛЕНИЯ</h5>
                                <span class="label label-round label-danger">New 5</span>
                            </li>
                            <li class="list-group" role="presentation">
                                <div data-role="container">
                                    <div data-role="content">
                                        <a class="list-group-item" href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms" target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Вышло обновление для FriendlyCMS</h6>
                                                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">5 hours ago</time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms" target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-account bg-green-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Completed the task</h6>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days ago</time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms" target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Settings updated</h6>
                                                    <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms" target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Event started</h6>
                                                    <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item" href="http://bleaksoft.ru/news/%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20friendlycms" target="_blank" role="menuitem">
                                            <div class="media">
                                                <div class="media-left padding-right-10">
                                                    <i class="icon md-comment bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Message received</h6>
                                                    <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-menu-footer" role="presentation">
                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                    <i class="icon md-settings" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" role="menuitem">
                                    Все уведомления
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>

        </div>
    </nav>
    <div class="site-menubar">
        <div class="site-menubar-body">
            <div>
                <div>
                    <ul class="site-menu">
                        @foreach($menus as $menu)
                            <li class="dropdown site-menu-item has-sub">
                                <a class="dropdown-toggle" href="{{ $menu->slug }}" data-dropdown-toggle="false">
                                    <span class="site-menu-title"> {{ $menu->name }}</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                                <div class="dropdown-menu">
                                    <div class="site-menu-scroll-wrap is-list">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-normal-list">
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="grids.html">
                                                            <span class="site-menu-title">Сетка Bootstrap</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="layout-grid.html">
                                                            <span class="site-menu-title">Сетка Layout</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="headers.html">
                                                            <span class="site-menu-title">Выбор Заголовка</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="panel-transition.html">
                                                            <span class="site-menu-title">Управляемые панели</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="wide.html">
                                                            <span class="site-menu-title">Широкий Макет</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="two-columns.html">
                                                            <span class="site-menu-title">Две колонки</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="bordered-header.html">
                                                            <span class="site-menu-title">Выделенный Заголовок</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="bordered-header.html">
                                                            <span class="site-menu-title">Выделенный Заголовок</span>
                                                        </a>
                                                    </li>
                                                    <li class="site-menu-item">
                                                        <a class="animsition-link" href="page-aside-fixed.html">
                                                            <span class="site-menu-title">Фиксированный сайдбар</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@yield('nav')
@yield('content')

@section('footer')
    <footer class="site-footer">
        <div class="site-footer-legal">© 2016 <a href="http://friendlycms.ru/" target="_blank">FriendlyCMS</a></div>
        <div class="site-footer-right">
            Используйте с <i class="red-600 icon md-favorite"></i> и <a href="http://friendlycms.ru/pages/download-friendlycms" target="_blank">бесплатно</a>
        </div>
    </footer>
@endsection

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
