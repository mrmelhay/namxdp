@extends('layouts.main')

@section('content')


        <div class="panel">
            <div class="example-wrap">


        <div class="example table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th rowspan="2">Ташкилотлар номи</th>
                    <th rowspan="2">БПТ раислари сони</th>
                    <th rowspan="2">Шундан,аёллар</th>
                    <th colspan="2">Маълумоти</th>
                    <th colspan="5">Ёши</th>
                </tr>
                <tr>
                    <td>Олий</td>
                    <td>ўрта</td>
                    <td>30 Ёшгача</td>
                    <td>30-45</td>
                    <td>45-55</td>
                    <td>55-60</td>
                    <td>60 ёшдан юқори</td>
                </tr>


                </thead>
                <tbody>

                @foreach($reports as $report)
                <tr>
                    <td> {{ $report->region_name}} {{ $report->district_name}}</td>
                    <td>
                        {{ $report->lscount}}
                    </td>
                    <td>
                        {{ $report->sxcount}}
                    </td>

                    <td>
                        {{ $report->spccountoliy }}
                    </td>
                    <td>
                        {{ $report->spccounturta }}
                    </td>

                    <td>
                        {{ $report->age30 }}
                    </td> <td>
                        {{ $report->age3040 }}
                    </td> <td>
                        {{ $report->age4555 }}
                    </td> <td>
                        {{ $report->age5560 }}
                    </td> <td>
                        {{ $report->age60 }}
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>


@endsection