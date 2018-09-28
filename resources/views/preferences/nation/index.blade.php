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
                    <th><input type="checkbox"  name="nation" id="nation" /></th>
                    <th>ID</th>
                    <th>Millat номи</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($nations as $nation)

                    <tr>

                        <td><input type="checkbox" value="{{ $nation->nation_id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                        <td><a href="{{ url('/sex/'.$nation->nation_id) }}/edit">{{ $nation->nation_id}}</a></td>
                        <td>{{ $nation->nation_name }}</td>
                        <td>
                            <a href="{{ url('/sex/'.$nation->nation_id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('sex/'.$nation->nation_id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="sex_id" value="{{$nation->nation_id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection