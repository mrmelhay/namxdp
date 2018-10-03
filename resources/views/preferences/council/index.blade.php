@extends('layouts.main')
@section('content')
    <div class="panel page-main">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('council/create')}}';">+ Партия қўшиш</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                {{--<tr>--}}
                    {{--<form action="{{route('search')}}" method="post">--}}
                        {{--{{csrf_field()}}--}}
                        {{--<th class="pre-cell"></th>--}}
                        {{--<th class="cell-30" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"></th>--}}
                        {{--<th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">--}}
                            {{--<input class="form-control" name="fullName" type="text"></th>--}}
                        {{--<th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">--}}
                            {{--<select name="bpt_id" data-plugin="select2">--}}
                                {{--<option disabled selected>БПТ номи</option>--}}
                                {{--@foreach($bpts as $bpt)--}}
                                    {{--<option value="{{$bpt->bpt_id}}">{{$bpt->bpt_name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</th>--}}
                        {{--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">--}}
                            {{--<input class="form-control" name="unionJoinDate" type="text" data-provide="datepicker"></th>--}}
                        {{--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">--}}
                            {{--<input class="form-control" name="birthday" type="text" data-provide="datepicker"></th>--}}
                        {{--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">--}}
                            {{--<select  data-plugin="select2"  name="isFeePaid">--}}
                                {{--<option disabled selected>Бадал</option>--}}
                                {{--<option value="1">Тўлайди</option>--}}
                                {{--<option value="0">Тўламайди</option>--}}
                            {{--</select></th>--}}
                        {{--<th class="suf-cell"></th>--}}

                        {{--<th style="border: none;"><button type="submit" class="btn btn-default"><i class="fa-search"> </i></button></th>--}}
                        {{--<th style="border: none;"><button type="submit" class="btn btn-default"><i class="fa-filter"> </i></button></th>--}}
                        {{--<input type="hidden" name="key" value="_member">--}}
                    {{--</form>--}}
                {{--</tr>--}}
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Partiya номи</th>
                    <th>Partiya manzili</th>
                    <th>Partiya rahbari</th>
                    <th>Partiya telefoni</th>
                    <th>Partiya viloyati</th>
                    <th>Partiya tumani</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($parties as $party)

                    <tr>

                        <td></td>
                        <td><a href="{{ url('/council/'.$party->party_id) }}/edit">{{ $party->party_id}}</a></td>
                        <td>{{ $party->party_name }}</td>
                        <td>{{ $party->party_address }}</td>
                        <td>{{ $party->party_director }}</td>
                        <td>{{ $party->party_phone }}</td>
                        <td>{{ $party->region->region_name }}</td>
                        <td>{{ $party->distirict->district_name }}</td>
                        <td>
                            <a href="{{ url('/council/'.$party->party_id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('council/'.$party->party_id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="party_id" value="{{$party->party_id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection