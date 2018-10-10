@extends('layouts.main')
@section('content')
    <div>
        @include('commons.errors_list')
    </div>
    <form action="{{url('nation/'.$nation->nation_id)}}" method="post">
        <div class="row">
            <div class="col-md-6">{{csrf_field()}}{{method_field('PUT')}}
                <input type="text" required="required" name="nation_name" value="{{$nation->nation_name}}" id="nation_name" class="form-control"><br>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="submitButton">
            <button type="submit" class="btn btn-primary ">Сақлаш</button>
        </div>
    </form>
@endsection