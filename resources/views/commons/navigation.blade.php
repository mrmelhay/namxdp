<nav class="site-navbar navbar navbar-inverse navbar-fixed-top navbar-mega navbar-inverse"
     role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Переключить</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand navbar-brand-center" href="/">
            <img class="navbar-brand-logo navbar-brand-logo-normal" src="{!! asset('images/logo_new.png') !!}"
                 title="Material">
            <img class="navbar-brand-logo navbar-brand-logo-special" src="{!! asset('images/logo_new.png') !!}"
                 title="Material">
            <span class="navbar-brand-text hidden-xs">ХДП</span>
        </a>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Переключить Поиск</span>
            <i class="icon md-search" aria-hidden="true"></i>
        </button>
    </div>
    <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
                       aria-expanded="false" role="button">
                        <span class="flag-icon flag-icon-uz"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="javascript:void(0)" role="menuitem">
                                <span class="flag-icon flag-icon-uz"></span> Ўзбекча</a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0)" role="menuitem">
                                <span class="flag-icon flag-icon-ru"></span> Русский</a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="{{ asset('images/5.jpg') }}">
                <i></i>
              </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
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
                    <a data-toggle="dropdown" id="checkBtn" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <i class="icon md-notifications" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                    @if($user_role_id!=3)
                            <li class="dropdown-menu-header" role="presentation">
                                <h5>XАБАРНОМА</h5>
                            </li>
                        @php  $nots = \App\Notification::getNews($user_role_id); @endphp
                        @if(count($nots) > 0)
                            @if(in_array($user_role_id, array(1,2))){{--if user is region|district--}}
                            <li class="list-group" role="presentation">
                                <div data-role="container">
                                    <div data-role="content">
                                        @foreach($nots as $note)
                                            @if($note->message_type_id==1)
                                                <div class="alert alert-success" role="alert" style="margin-bottom: 0; border-radius: 0;">
                                                    <small> {{$note->created_at->diffForHumans()}}</small> <small  style="float: right;"> {{($note->sender_role_id==3)?'Республика':'Вилоят'}}</small> <br/><p style="color: black;">{!! $note->message !!}</p>
                                                </div>
                                            @else
                                                <div class="alert alert-danger" role="alert" style="margin-bottom: 0; border-radius: 0;">
                                                    <small> {{$note->created_at->diffForHumans()}}</small> <small  style="float: right;"> {{($note->sender_role_id==3)?'Республика':'Вилоят'}}</small> <br/><br/><p style="color: black;">{!! $note->message !!}</p>
                                                </div>
                                            @endif
                                            <input type="hidden" value="{{$note->id}}" id="note{{$note->id}}">
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            @endif
                        @else
                            <li class="dropdown-menu-header" role="presentation">
                                <h5>Хабарлар йўқ</h5>
                            </li>
                        @endif
                        <li class="dropdown-menu-footer" role="presentation">
                            @if(in_array($user_role_id, array(1,3)))
                                <a class="dropdown-menu-footer-btn" id="bt" role="button">
                                    Xaбар жўнатиш
                                </a>
                            @endif
                            @if(in_array($user_role_id, array(1,2)))
                                <a href="{{url('/view-notifications')}}" target="_blank" role="menuitem">
                                    Барча ҳабарлар
                                </a>
                            @endif
                        </li>
                    @else
                        <li class="dropdown-menu-header" role="presentation">
                            <a class="dropdown-menu-header-btn" id="bt" role="button">
                                Xaбар жўнатиш
                            </a>
                        </li>
                    @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xaбар жўнатиш</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Xaбарнинг тури</label>
                        <select class="form-control" name="message_type" id="message_type">
                            <option value="1">Янгилик</option>
                            <option value="2">Огохлантириш</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Xaбар мазмуни</label>
                        <textarea class="form-control" rows="7" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                <button type="button" id="sendMessage" class="btn btn-primary">Юбориш</button>
            </div>
        </div>
    </div>
</div>



<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle" href="{{url('/')}}" data-dropdown-toggle="false">
                            <span class="site-menu-title">Асосий</span>

                        </a>
                    </li>

                        <li class="dropdown site-menu-item has-sub">
                            <a  href="{{ url('membership') }}" >
                                <span class="site-menu-title">Аъзолик</span>

                            </a>
                        </li>

                    <li class="dropdown site-menu-item has-sub">
                        <a href="{{ url('bpt') }}">
                            <span class="site-menu-title">БПТлар</span>
                        </a>
                    </li>

                    <li class="dropdown site-menu-item has-sub">
                        <a  href="{{ url('reports') }}" >
                            <span class="site-menu-title">Ҳисоботлар</span>
                        </a>
                    </li>

                    <li class="dropdown site-menu-item has-sub">
                        <a class="dropdown-toggle" data-dropdown-toggle="false">
                            <span class="site-menu-title">Маълумотнома</span>
                            <span class="site-menu-arrow"></span>
                        </a>

                        <div class="dropdown-menu">
                            <div class="site-menu-scroll-wrap is-list">
                                <div>
                                    <div>
                                        <ul class="site-menu-sub site-menu-normal-list">
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('province') }}">
                                                    <span class="site-menu-title">Вилоятлар</span>
                                                </a>
                                            </li>

                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('district') }}">
                                                    <span class="site-menu-title">Туман/шаҳар</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('/sex') }}">
                                                    <span class="site-menu-title">Жинси</span>
                                                </a>
                                            </li>

                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('nation') }}">
                                                    <span class="site-menu-title">Миллат</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('socCats') }}">
                                                    <span class="site-menu-title">Ижтимоий тоифа </span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('bpt') }}">
                                                    <span class="site-menu-title">БПТлар</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('bpt_spec') }}">
                                                    <span class="site-menu-title">БПТ сохалари</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{url('council')}}">
                                                    <span class="site-menu-title">Кенгашлар</span>
                                                </a>
                                            </li>
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="{{ url('users') }}">
                                                    <span class="site-menu-title">Фойдаланувчилар яратиш</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>