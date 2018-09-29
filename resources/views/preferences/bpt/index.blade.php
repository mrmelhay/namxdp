@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <h4 class="example-title">{{$title}}</h4>
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