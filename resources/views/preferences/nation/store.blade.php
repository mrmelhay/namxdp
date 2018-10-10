@extends('layouts.main')

@section('content')

            <div>
                @include('commons.errors_list')
            </div>

            <form action="{{url('/nation')}}" method="post">

                <div class="row">

                <div class="col-md-6">{{csrf_field()}}{{method_field('POST')}}

                <input type="text" required="required" name="nation_name" value="{{old('nation_name')}}" id="nation_name" class="form-control" placeholder="Миллат номи"><br>

                </div>
                <div class="col-md-6">
                </div>
                </div>
                <div class="submitButton">
                    <button type="submit" class="btn btn-primary ">Saqlash</button>
                </div>

            </form>
@endsection