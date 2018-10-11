@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('socCats/create')}}';">+ Тоифа қўшиш</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox"  name="region" id="region" /></th>
                    <th>ID</th>
                    <th>Toifa номи</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($socs as $soc)

                    <tr>

                        <td><input type="checkbox" value="{{ $soc->soc_id }}" class="selectable-item" name="region[]" id="region[]" /></td>
                        <td><a href="{{ url('/province/'.$soc->soc_id) }}/edit">{{ $soc->soc_id }}</a></td>
                        <td>{{ $soc->soc_name }}</td>
                        <td>
                            <a href="{{ url('/socCats/'.$soc->soc_id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('formDelete{{ $soc->soc_id }}').submit()"><i class="fa fa-trash"></i></a>
                            <form action="{{url('/socCats').'/'.$soc->soc_id}}" id="formDelete{{ $soc->soc_id }}" method="post">
                                <input type="hidden" name="soc_id" value="{{$soc->soc_id}}">
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