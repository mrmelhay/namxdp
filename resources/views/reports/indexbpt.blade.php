@extends('layouts.main')

@section('content')

    <div class="panel">
        <div class="example-wrap">
            <div class="example table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">Ташкилотлар номи</th>
                        <th rowspan="2">БПТлар сони</th>
                        <th rowspan="2">Ундаги партия аъзолар сони</th>
                        <th rowspan="2">БПТлардаги ўртача партия аъзолари сони</th>
                        <th colspan="7">Шундан,бошлангич партия ташкилотлардаги аъзолар сони</th>
                    </tr>
                    <tr>
                        <td>3 нафардан 5тагача</td>
                        <td>5 нафардан 15 тагача</td>
                        <td>15 нафардан 25 тагача</td>
                        <td>25 нафардан 40 тагача</td>
                        <td>40 нафардан 60 гача</td>
                        <td>60 нафардан 100 тагача</td>
                        <td>100 нафардан юқори</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        @php
                            $_3_5 = 0;
                            $_0_3 = 0;
                            $_5_15 = 0;
                            $_15_25 = 0;
                            $_25_40 = 0;
                            $_40_60 = 0;
                            $_60_100 = 0;
                            $_100_ = 0;
                        @endphp
                        @php
                            $cd = \App\BPT::where(['bpt_district_id' => $report->districtId,'bpt_region_id' => $report->regionId])->get();
                            foreach ($cd as $k){
                                $c = $k->members->count();
                                if($c > 2 && $c < 6){
                                    $_3_5++;
                                }if($c > 5 && $c < 16){
                                    $_5_15++;
                                }if($c > 15 && $c < 26){
                                    $_15_25++;
                                }if($c > 25 && $c < 41){
                                    $_25_40++;
                                }if($c > 40 && $c < 61){
                                    $_40_60++;
                                }if($c > 60 && $c < 101){
                                    $_60_100++;
                                }if($c > 100){
                                    $_100_++;
                                }
                            }
                        @endphp
                        <tr>
                            <td> {{ $report->region_name}} {{ $report->district_name}}</td>
                            <td> {{ $report->bptcount}}</td>
                            <td> {{ $report->ismember}}</td>
                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                            <td> {{ round($_3_5) }}</td>
                            <td> {{ round($_5_15)}}</td>
                            <td> {{ round($_15_25)}}</td>
                            <td> {{ round($_25_40)}}</td>
                            <td> {{ round($_40_60)}}</td>
                            <td> {{ round($_60_100)}}</td>
                            <td> {{ round($_100_)}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection