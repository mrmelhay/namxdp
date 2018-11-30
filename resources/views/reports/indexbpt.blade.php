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
                        <tr>


                            <td> {{ $report->region_name}} {{ $report->district_name}}</td>
                            <td> {{ $report->bptcount}}</td>
                            <td> {{ $report->ismember}}</td>


                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                            <td> {{ round($report->ismember/$report->bptcount)}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection