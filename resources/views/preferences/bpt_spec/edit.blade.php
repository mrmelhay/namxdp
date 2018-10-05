@extends('layouts.main')
@section('content')
    <div>
        @include('commons.errors_list')
    </div>
    <form action="{{url('bpt_spec/'.$bpt_spec->id)}}" method="post">
        <div class="row">
            <div class="col-md-6">{{csrf_field()}}{{method_field('PUT')}}
                <input type="text" required="required" name="bpt_spec_name" value="{{$bpt_spec->bpt_spec_name}}" id="bpt_spec_name" class="form-control" placeholder="Соха номи"><br>
                <br><div class="submitButton">
                    <button type="submit" class="btn btn-primary ">Сақлаш</button>
                </div>
            </div>

            <div class="col-md-6">
            </div>
        </div>
    </form>
@endsection