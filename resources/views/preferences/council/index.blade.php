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
                    <th><input type="checkbox"  name="party" id="party" /></th>
                    <th>ID</th>
                    <th>Partiya номи</th>
                    <th>Partiya manzili</th>
                    <th>Partiya rahbari</th>
                    <th>Partiya telefoni</th>
                    <th>Partiya viloyati</th>
                    <th>Partiya tumani</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($parties as $party)

                    <tr>

                        <td><input type="checkbox" value="{{ $party->party_id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                        <td><a href="{{ url('/council/'.$party->party_id) }}/edit">{{ $party->party_id}}</a></td>
                        <td>{{ $party->party_name }}</td>
                        <td>{{ $party->party_address }}</td>
                        <td>{{ $party->party_director }}</td>
                        <td>{{ $party->party_phone }}</td>
                        <td>{{ $party->region->region_name }}</td>
                        <td>{{ $party->district->district_name }}</td>
                        <td>
                            <a href="{{ url('/council/'.$party->party_id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('council/'.$party->party_id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="bpt_id" value="{{$party->party_id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection