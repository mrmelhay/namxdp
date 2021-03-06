@extends('layouts.main')

@section('content')
    <div class="panel">
        <div class="example-wrap">
            <div class="example table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">Туман(шахар) кенгаши номи</th>
                        <th rowspan="2">БПТ умумий сони</th>
                        <th colspan="6">Шу жумладан</th>
                    </tr>
                    <tr>
                        <td>Махалла фуқаролар йиғини</td>
                        <td>Ишлаб чиқариш</td>
                        <td>Қишлоқ хўжалиги</td>
                        <td>Хизмат кўрсатиш</td>
                        <td>Соғлиқни сақлаш</td>
                        <td>Бошқа соха</td>
                    </tr>


                    </thead>
                    <tbody>

                    @foreach($reports as $report)
                        <tr>
                            <td> {{ $report->bpt_name}}</td>
                            <td> {{ $report->bptcount}}</td>
                            <td> {{ $report->bpt_mfy}}</td>
                            <td> {{ $report->ishlabchiqarish}}</td>
                            <td> {{ $report->qishloq}}</td>
                            <td> {{ $report->xizmat}}</td>
                            <td> {{ $report->sogliq}}</td>
                            <td> 0</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection