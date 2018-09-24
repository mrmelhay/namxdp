@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <h4 class="example-title">Туман/шахарлар</h4>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox"  name="region" id="region" /></th>
                    <th>ID</th>
                    <th>Вилоят номи</th>
                    <th>Туман/Шахар номи</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($districts as $district)

                    <tr>

                        <td><input type="checkbox" value="{{ $district->district_id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                        <td><a href="{{ url('/province/action/edit/'.$district->district_id) }}">{{ $district->district_id }}</a></td>
                        <td>{{ $district->districts[0]->region_name }}</td>
                        <td>{{ $district->district_name }}</td>
                        <td>
                            <a href="{{ url('/province/action/edit/'.$district->district_id) }}"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a href="{{ url('/province/action/delete/'.$district->district_id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection