@extends('layouts.main')

@section('content')

    <div>
        @include('commons.errors_list')
    </div>

    <form action="{{url('/socCats')}}" method="post">

        <div class="row">

            <div class="col-md-6">{{csrf_field()}}{{method_field('POST')}}

                <input type="text" required="required" name="soc_name" value="{{old('soc_name')}}" id="soc_name" class="form-control" placeholder="Тоифа номи"><br>

            </div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="submitButton">
            <button type="submit" class="btn btn-primary ">Сақлаш</button>
        </div>

    </form>
@endsection