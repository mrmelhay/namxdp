@extends('layouts.main')
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
@section('content')
    <div class="page-content container-fluid">
    <div class="col-xlg-12">
        <!-- Panel OData Service -->
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">OData Service</h3>
            </header>
            <div class="panel-body">
                <div id="exampleOData"></div>
            </div>
        </div>
        <!-- End Panel OData Service -->
    </div>
    </div>
@endsection