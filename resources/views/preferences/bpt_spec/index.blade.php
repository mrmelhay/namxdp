@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('bpt_spec/create')}}';">+ Бптга соха қўшиш</button>
                    {{--<button class="btn btn-warning btn-md" id="editBtn"> <span id="countt"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-pencil"></span> Ўзгартириш</button>--}}
                    {{--<button class="btn btn-default btn-md">Пенсия</button>--}}
                    {{--<button class="btn btn-default btn-md">Бадал</button>--}}
                    {{--<button class="btn btn-danger btn-md" id="deleteBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-trash"></span> Ўчириш</button>--}}
                    {{--<button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> та танланди</button>--}}
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>БПТ номи</th>
                    <th>Амаллар</th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($bpt_specs as $bpt)
                    <tr>
                        <td><a href="{{ url('bpt_specs/'.$bpt->id) }}/edit">{{ $bpt->id}}</a></td>
                        <td>{{ $bpt->bpt_spec_name }}</td>
                        <td>
                            <a href="{{ url('/bpt_spec/'.$bpt->id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('bpt_spec/'.$bpt->id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="bpt_spec_id" value="{{$bpt->id}}">
                            </form>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection