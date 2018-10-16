@extends('layouts.main')

@section('content')
<div class="panel">
    <div class="example-wrap">
        <div class="example table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th >БПТ номи</th>
                    <th >БПТдаги аъзолар сони</th>
                    <th >БПТ ташкил этилган санаси</th>
                    <th >БПТ манзили</th>
                    <th >БПТ раиси Ф.И.Ш</th>
                    <th >БПТ раиснинг туғилган йили</th>
                    <th >БПТ раиснинг яшаш манзили</th>
                    <th >Маълумоти мутахассислиги қачон,<br/>қайси ўқув юртини таъмомлаган</th>
                    <th >Иш жойи, лавозими,<br/>боғланиш телефонлари</th>
                </tr>
                </thead>
                <tbody>

                @foreach($reports as $report)
                    <tr>
                        <td> {{ $report->bpt_name }}</td>
                        <td> {{ $report->bpcount}}</td>
                        <td> {{ $report->esdate}}</td>
                        <td> {{ $report->bpt_address}}</td>
                        <td> {{ $report->fullName}}</td>
                        <td> {{ $report->birthday}}</td>
                        <td> {{ $report->homeaddress}}</td>
                        <td> {{ $report->specialist}}</td>
                        <td> {{ $report->workPlaceAndPosition  }} , {{ $report->phoneNumber }}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection