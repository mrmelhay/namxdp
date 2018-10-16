@extends('layouts.main')

@section('content')
    <div class="panel">
        <div class="example-wrap">
            <div class="example table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">Кенгаш номи</th>
                        <th rowspan="2">Аъзолар сони</th>
                        <th rowspan="2">Ўтган ойга нисбатан</th>
                        <th rowspan="2">БПТ сони</th>
                        <th rowspan="2">Ўтган ойга нисбатан</th>
                        <th rowspan="2">Аъзоларга нисбатан БПТда ўртача сони</th>
                        <th colspan="3">Бир ойда қабул</th>
                        <th colspan="2">Шундан</th>
                        <th colspan="2">Бир ойдан хисоблан чиқарилганлар</th>
                        <th colspan="2">Шундан</th>
                        <th rowspan="2">Йил бошидан қабул</th>
                        <th colspan="2">Шундан</th>
                        <th rowspan="2">Жами хисобдан чиқарилганлар</th>
                        <th colspan="2">Шундан</th>
                        <th rowspan="2">Жами аёллар</th>
                        <th rowspan="2">Жами ёшлар</th>
                    </tr>
                    <tr>
                        <td>Жами қаубл</td>
                        <td>Янги қабул</td>
                        <td>Шундан бошқа тумандан келган</td>
                        <td>Аёллар</td>
                        <td>Ёшлар</td>
                        <td>Жами хисобдан чиқарилганлар</td>
                        <td>Шундан бошқа туманга кетган</td>
                        <td>Аёллар</td>
                        <td>Ёшлар</td>
                        <td>Аёллар</td>
                        <td>Ёшлар</td>
                        <td>Аёллар</td>
                        <td>Ёшлар</td>

                    </tr>


                    </thead>
                    <tbody>

                    @foreach($reports as $report)
                        <tr>
                            <td> {{ $report->bpt_name }}</td>
                            <td> {{ $report->bpcount}}</td>
                            <td> {{ $report->esdate}}</td>
                            {{--<td> {{ round($report->ismember/$report->bptcount)}}</td>--}}
                            {{--<td> {{ round($report->ismember/$report->bptcount)}}</td>--}}
                            {{--<td> {{ round($report->ismember/$report->bptcount)}}</td>--}}
                            {{--<td> {{ round($report->ismember/$report->bptcount)}}</td>--}}
                            {{--<td> {{ round($report->ismember/$report->bptcount)}}</td>--}}

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection