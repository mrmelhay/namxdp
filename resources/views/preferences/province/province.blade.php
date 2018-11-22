@extends('layouts.main')

@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <h4 class="example-title">Ҳудудлар</h4>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox"  name="region" id="region" /></th>
                    <th>ID</th>
                    <th>Вилоят номи</th>
                    <th>Амаллар</th>
                </thead>
                <tbody>
                @foreach($regions as $region)
                <tr>
                    <td><input type="checkbox" value="{{ $region->region_id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                    <td><a href="{{ url('/province/action/edit/'.$region->region_id) }}">{{ $region->region_id }}</a></td>
                   <td>{{ $region->region_name }}</td>
                    <td>
                       <a href="{{ url('/province/action/edit/'.$region->region_id) }}"><i class="fa fa-pencil"></i></a>&nbsp;
                       <a href="{{ url('/province/action/delete/'.$region->region_id) }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection