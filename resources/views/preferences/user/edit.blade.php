@extends('layouts.main')

@section('content')

    <div>
        @include('commons.errors_list')
    </div>

    <form action="{{ url('/users'.'/'.$user->id) }}" method="POST">

        <div class="row">

            <div class="col-md-6">
                {{csrf_field()}}
                {{method_field('PUT')}}

                <input type="text" required="required" name="name" value="{{$user->name}}" id="name" class="form-control" placeholder="Ф.И.О" autocomplete="off"><br>

                <input type="text" required="required" name="email" disabled value="{{$user->email}}" id="email" class="form-control" placeholder="Email" autocomplete="off"><br>

                <input autocomplete="off" type="password" required="required" name="password" id="password" disabled value="{{$user->password}}" class="form-control" placeholder="Махфий калит"><br>

                <input  id="password-confirm" type="password" class="form-control" placeholder="Махфий калитни такрорлаш" disabled value="{{$user->password}}" name="password_confirmation" required><br>

                <select name="role_id" data-plugin="select2" required="required" id="role_id" class="form-control">
                    <option selected value="{{$user->role_id}}">{{$user->role->role_name}}</option>
                    @foreach($roles as $role)
                        <option value="{{$role->role_id}}">{{$role->role_name}}</option>
                    @endforeach
                </select><br>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="submitButton">
            <button type="submit" class="btn btn-primary ">Сақлаш</button>
        </div>

    </form>
@endsection