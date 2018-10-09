@extends('layouts.main')

@section('content')

            <div>
                @include('commons.errors_list')
            </div>

            <form action="{{ url('/users') }}" method="POST">

                <div class="row">

                <div class="col-md-6">
                    {{csrf_field()}}
                    {{method_field('POST')}}

                <input type="text" required="required" name="name" value="{{old('name')}}" id="name" class="form-control" placeholder="Ф.И.О" autocomplete="off"><br>

                <input type="text" required="required" name="email" value="{{old('email')}}" id="email" class="form-control" placeholder="Email" autocomplete="off"><br>

                <input autocomplete="off" type="password" required="required" name="password" id="password" class="form-control" placeholder="Махфий калит"><br>

                <input  id="password-confirm" type="password" class="form-control" placeholder="Махфий калитни такрорлаш" name="password_confirmation" required><br>
                @if(isset($regions))
                    <select name="region_id" data-plugin="select2" required="required" id="role_id" class="form-control">
                        <option selected disabled>Вилоятни танлаш</option>
                        @foreach($regions as $role)
                            <option value="{{$role->region_id}}">{{$role->region_name}}</option>
                        @endforeach
                    </select><br>
                @endif
                    @if(isset($districts))
                        <select name="district_id" data-plugin="select2" required="required" id="role_id" class="form-control">
                            <option selected disabled>Туманни танлаш</option>
                            @foreach($districts as $role)
                                <option value="{{$role->district_id}}">{{$role->district_name}}</option>
                            @endforeach
                        </select><br>
                    @endif
                    @if(isset($district))
                        <input value="{{$district->district_name}}" type="text" class="form-control" disabled required><br>
                        <input id="dis" value="{{$district->district_id}}" type="hidden" class="form-control" name="district_id" required><br>
                    @endif
                </div>
                <div class="col-md-6">
                </div>
                </div>
                <div class="submitButton">
                    <button type="submit" class="btn btn-primary ">Сақлаш</button>
                </div>
            </form>
@endsection