@extends('layouts.main')
@section('content')
    <div class="panel">

        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('bpt/create')}}';">+ Бпт қўшиш</button>
                    <button class="btn btn-warning btn-md" id="editBtn"> <span id="countt"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-pencil"></span> Ўзгартириш</button>
                    <button class="btn btn-default btn-md">Пенсия</button>
                    <button class="btn btn-default btn-md">Бадал</button>
                    <button class="btn btn-danger btn-md" id="deleteBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-trash"></span> Ўчириш</button>
                    <button class="btn btn-default btn-md" onclick="window.location='{{url('arxiv')}}'">Архив</button>
                    <button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> та танланди</button>
                </div>
            </div>
            {{--<div class="page-header-actions">--}}
            {{--<form>--}}
            {{--<div class="input-search input-search-dark">--}}
            {{--<i class="input-search-icon md-search" aria-hidden="true"></i>--}}
            {{--<input type="text" class="form-control" name="" placeholder="Izlash...">--}}
            {{--</div>--}}
            {{--</form>--}}
            {{--</div>--}}
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox"  name="bpt" id="bpt" /></th>
                    <th>ID</th>
                    <th>Bpt номи</th>
                    <th>Bpt sohasi</th>
                    <th>Bpt manzili</th>
                    <th>M.F.Y yoki yo'q</th>
                    <th>Bpt tumani</th>
                    <th>Bpt viloyati</th>
                    <th>Partiya nomi</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($bpts as $bpt)
                    <tr>
                        <td><input type="checkbox" value="{{ $bpt->bpt_id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                        <td><a href="{{ url('/bpt/'.$bpt->bpt_id) }}/edit">{{ $bpt->bpt_id}}</a></td>
                        <td>{{ $bpt->bpt_name }}</td>
                        <td>{{ $bpt->bpt_speciality }}</td>
                        <td>{{ $bpt->bpt_address }}</td>
                        <td>{{ ($bpt->bpt_is_mfy)?'M.F.Y':'Yo\'q' }}</td>
                        <td>{{ $bpt->region->region_name }}</td>
                        <td>{{ $bpt->district->district_name }}</td>
                        <td>{{ $bpt->party->party_name }}</td>
                        <td>
                            <a href="{{ url('/bpt/'.$bpt->bpt_id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('bpt/'.$bpt->bpt_id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="bpt_id" value="{{$bpt->bpt_id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection