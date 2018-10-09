@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('users/create')}}';">+ Фойдаланувчи қўшиш</button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox"  name="region" id="region" /></th>
                    <th>№</th>
                    <th>Ф.И.О</th>
                    <th>Email</th>
                    <th>Мавқе</th>
                    <th>Худуди</th>
                    <th>А'зо бўлган сана</th>
                    <th>Амаллар</th>
                </thead>
                <tbody>
                @if(isset($users))
                    @foreach($users as $user)
                        <tr>
                            <td><input type="checkbox" value="{{ $user->id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                            <td><a href="{{ url('/users/'.$user->id) }}/edit">{{ $user->id}}</a></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->role_name }}</td>
                            <td>{{ $user->region_id==null?($user->district_id==null)?'Супер Админ':$user->district->district_name:$user->region->region_name}}</td>
                            <td>@php \Carbon\Carbon::setLocale('uz'); $date = \Carbon\Carbon::now();echo $user->created_at->diffForHumans($date); @endphp</td>
                            <td>
                                <a href="{{ url('/users/'.$user->id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                                <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                                <form method="post" id="deleteForm" action="{{url('users/'.$user->id)}}">
                                    {{csrf_field()}}{{method_field('DELETE')}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                @if(isset($regions))

                @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection