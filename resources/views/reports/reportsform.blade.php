@extends('layouts.main')
@section('content')
    <div class="panel">
    <div class="page animsition">

    <div class="page-content">

    <div class="documents-wrap articles">
        <ul class="blocks blocks-100 blocks-xlg-4 blocks-md-3 blocks-xs-2" data-plugin="matchHeight">
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="{{ url('reports/indexbptcheif') }}">БПТ раислари таркиби тўгрисида</a></h4>

                </div>
            </li>
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="{{ url('reports/indexbtpcount') }}">БПТлари сони тўгрисида</a></h4>
                </div>
            </li>
            {{--<li>--}}
                {{--<div class="articles-item">--}}
                    {{--<i class="icon md-file" aria-hidden="true"></i>--}}
                    {{--<h4 class="title"><a href="{{ url('reports/indexbtpcount2') }}">БПТлари сони тўгрисида (Умумий)</a></h4>--}}
                {{--</div>--}}
            {{--</li>--}}
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="{{ url('reports/indexbtpinfo') }}">БПТлари тўгрисида</a></h4>
                </div>
            </li>
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="{{ url('reports/indexxdpinfo') }}">Партия аъзолигига қабул бўйича</a></h4>
                </div>
            </li>
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="{{ url('reports/indexbptspecial') }}">БПТларнинг сохалардаги тақсимот бўйича</a></h4>
                </div>
            </li>

        </ul>
    </div>
    </div>
    </div>
@endsection