@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <h4 class="example-title">Туман/шаҳарлар</h4>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox"  name="region" id="region" /></th>
                    <th>ID</th>
                    <th>Вилоят номи</th>
                    <th>Туман/Шаҳар номи</th>
                    <th>Амаллар</th>
                </thead>
                <tbody>
                    @foreach($districts as $district)

                    <tr>

                        <td><input type="checkbox" value="{{ $district->district_id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                        <td><a href="{{ url('/district/action/edit/'.$district->district_id) }}">{{ $district->district_id }}</a></td>
                        <td>{{ $district->region->region_name }}</td>
                        <td>{{ $district->district_name }}</td>
                        <td>
                            <a href="{{ url('/district/action/edit/'.$district->district_id) }}"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('formDelete').submit()"><i class="fa fa-trash"></i></a>
                            <form action="{{url('/district')}}" method="post" id="formDelete">
                                <input type="hidden" name="district_id" value="{{$district->district_id}}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection