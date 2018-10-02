@extends('layouts.main')

@section('content')

    <div>
        @include('commons.errors_list')
    </div>

    <form action="{{url('bpt/'.$bpt->bpt_id)}}" method="post">

        <div class="row">

            <div class="col-md-6">
                {{csrf_field()}}
                {{method_field('PUT')}}

                <input type="text" required="required" name="bpt_name" value="{{$bpt->bpt_name}}" id="bpt_name" class="form-control" placeholder="БПТ номи"><br>

                <input placeholder="БПТ соҳаси" type="text" value="{{$bpt->bpt_speciality}}" required="required" name="bpt_speciality" id="bpt_speciality" class="form-control"><br>

                <p class="sex_p_tag"><label for="">  М.Ф.Й.  </label><input type="radio" {{((int)$bpt->bpt_is_mfy==1)?'checked':''}} name="bpt_is_mfy" value="1"><label for="">  М.Ф.Й. эмас  </label><input type="radio" name="bpt_is_mfy" {{((int)$bpt->bpt_is_mfy==0)?'checked':''}} value="0"></p>

                <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="bpt_region_id" name="" id="">
                    @foreach($regions as $region)
                        @if($bpt->bpt_region_id==$region->region_id)
                            <option value="{{$region->region_id}}" selected>{{$region->region_name}}</option>
                        @else
                            <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                        @endif
                    @endforeach
                </select><br>

                <select name="bpt_district_id" data-plugin="select2" class="form-control" id="response">
                            <option value="{{$bpt->bpt_district_id}}">{{$bpt->district->district_name}}</option>
                </select><br>
                <input type="text" name="bpt_address" id="bpt_address" value="{{$bpt->bpt_address}}" required="required" class="form-control" placeholder="БПТ манзили"><br>

                <select name="bpt_party_id" id="bpt_party_id" data-plugin="select2" required="required" class="form-control">

                    @foreach($councils as $party)
                        @if($party->party_id==$bpt->party_id)
                            <option value="{{$bpt->region_id}}" selected>{{$bpt->party->party_name}}</option>
                        @else
                            <option value="{{$party->party_id}}">{{$party->party_name}}</option>
                        @endif
                    @endforeach

                </select><br>
                <div class="submitButton">
                    <button type="submit" class="btn btn-primary ">Сақлаш</button>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>

    </form>

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