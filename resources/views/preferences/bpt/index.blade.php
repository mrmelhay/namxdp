@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('bpt/create')}}';">+ Бпт қўшиш</button>
                    {{--<button class="btn btn-warning btn-md" id="editBtn"> <span id="countt"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-pencil"></span> Ўзгартириш</button>--}}
                    {{--<button class="btn btn-default btn-md">Пенсия</button>--}}
                    {{--<button class="btn btn-default btn-md">Бадал</button>--}}
                    {{--<button class="btn btn-danger btn-md" id="deleteBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-trash"></span> Ўчириш</button>--}}
                    {{--<button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> та танланди</button>--}}
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <form action="{{route('search')}}" method="post">
                        {{csrf_field()}}
                        <th class="cell-30" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"></th>
                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                            <input class="form-control" name="bpt_name" placeholder="БПТ номи" type="text"/>
                        </th>
                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                            <select name="bpt_speciality_id" id="bpt_speciality_id" data-plugin="select2">
                                <option disabled selected>Сохани танлаш</option>
                                @foreach($bpt_specs as $bpt_spec)
                                    <option value="{{$bpt_spec->id}}">{{$bpt_spec->bpt_spec_name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                            <select  data-plugin="select2"  name="isFeePaid">
                                <option disabled selected>М.Ф.Й</option>
                                <option value="1">М.Ф.Й</option>
                                <option value="0">М.Ф.Й эмас</option>
                            </select>
                        </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                            <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="bpt_region_id" name="" id="">
                                <option disabled selected>Вилоят</option>
                                @foreach($regions as $region)
                                    <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                            <select name="bpt_district_id" data-plugin="select2" class="form-control" id="response">
                                <option selected disabled>Туман</option>
                            </select>
                        </th>
                        <th class="suf-cell">
                            <input class="form-control" name="bpt_address" placeholder="БПТ манзили" type="text">
                        </th>
                        <th class="suf-cell">
                            <select class="form-control" data-plugin="select2" name="bpt_party_id" id="">
                                <option disabled selected>Партия номи</option>
                                @foreach($councils as $council)
                                    <option value="{{$council->party_id}}">{{$council->party_name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th style="border: none;"><button type="submit" class="btn btn-default"><i class="fa-search"> </i></button></th>
                        <th style="border: none;"><button type="submit" class="btn btn-default"><i class="fa-filter"> </i></button></th>
                        <input type="hidden" name="key" value="_bpt">
                    </form>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>БПТ номи</th>
                    <th>БПТ соҳаси</th>
                    <th>БПТ ташкил топган сана</th>
                    <th>МФЙми?</th>
                    <th>БПТ вилояти</th>
                    <th>БПТ тумани</th>
                    <th>БПТ манзили</th>
                    <th>Партия номи</th>
                    <th>Амаллар</th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($bpts as $bpt)
                    <tr>
                        <td><a href="{{ url('/bpt/'.$bpt->bpt_id) }}/edit">{{ $bpt->bpt_id}}</a></td>
                        <td>{{ $bpt->bpt_name }}</td>
                        <td>{{ $bpt->spec->bpt_spec_name }}</td>
                        <td>{{ $bpt->bpt_establish_date }}</td>
                        <td>{{ ($bpt->bpt_is_mfy)?'M.F.Y':'Yo\'q' }}</td>
                        <td>{{ $bpt->region->region_name }}</td>
                        <td>{{ $bpt->district->district_name }}</td>
                        <td>{{ $bpt->bpt_address }}</td>
                        <td>{{ $bpt->party->party_name }}</td>
                        <td>
                            <a href="{{ url('/bpt/'.$bpt->bpt_id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('bpt/'.$bpt->bpt_id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="bpt_id" value="{{$bpt->bpt_id}}">
                            </form>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function getDistrict(select){
            var xhttp = new XMLHttpRequest();


            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);


                    var textP;
                    for(var i=0; i<data.districts.length; ++i){
                        textP += '<option value="'+ data.districts[i].district_id +'">'+ data.districts[i].district_name +'</option>';
                    }
                    document.getElementById('response').innerHTML = textP;
                }
            };
            xhttp.open("GET", '{{url('api/getDistricts/')}}/'+select.value, true);
            xhttp.send();
        }
    </script>

@endsection