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
                    <th><input type="checkbox"  name="region" id="region" /></th>
                    <th>ID</th>
                    <th>Jins номи</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($sexes as $sex)

                    <tr>

                        <td><input type="checkbox" value="{{ $sex->sex_id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                        <td><a href="{{ url('/sex/'.$sex->sex_id) }}/edit">{{ $sex->sex_id}}</a></td>
                        <td>{{ $sex->sex_name }}</td>
                        <td>
                            <a href="{{ url('/sex/'.$sex->sex_id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('sex/'.$sex->sex_id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="sex_id" value="{{$sex->sex_id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection