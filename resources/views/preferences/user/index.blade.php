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
                    <th>F.I.O</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>A'zo bo'lgan sana</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($users as $user)

                    <tr>

                        <td><input type="checkbox" value="{{ $user->id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                        <td><a href="{{ url('/user/'.$user->id) }}/edit">{{ $user->id}}</a></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>@php \Carbon\Carbon::setLocale('uz'); $date = \Carbon\Carbon::now();echo $user->created_at->diffForHumans($date); @endphp</td>
                        <td>
                            <a href="{{ url('/user/'.$user->id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('user/'.$user->id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection