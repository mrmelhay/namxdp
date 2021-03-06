@extends('layouts.main')

@section('content')

            <div>
                @include('commons.errors_list')
            </div>

            <form action="{{url('/bpt')}}" method="post">

                <div class="row">

                <div class="col-md-6">{{csrf_field()}}{{method_field('POST')}}

                <input type="text" required="required" name="bpt_name" value="{{old('bpt_name')}}" id="bpt_name" class="form-control" placeholder="БПТ номи"><br>

                    <select name="bpt_speciality_id" id="bpt_speciality_id" data-plugin="select2">
                        <option disabled selected>Сохани танлаш</option>
                        @foreach($bpt_specs as $bpt_spec)
                            <option value="{{$bpt_spec->id}}">{{$bpt_spec->bpt_spec_name}}</option>
                        @endforeach
                    </select><br>

                <input placeholder="БПТ ташкил топган сана" type="text" value="{{old('bpt_establish_date')}}" required="required" data-provide="datepicker" name="bpt_establish_date" id="bpt_establish_date" class="form-control" ><br>

                <p class="sex_p_tag"><label for="">  МФЙ  </label><input type="radio" name="bpt_is_mfy" value="1"><label for="">  МФЙ эмас  </label><input type="radio" name="bpt_is_mfy" value="0" checked></p>

                    <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="bpt_region_id" name="" id="">
                        <option disabled selected>Вилоятни танланг...</option>
                        @foreach($regions as $region)
                            <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                        @endforeach
                    </select><br>

                    <select name="bpt_district_id" data-plugin="select2" class="form-control" id="response">
                        <option selected disabled>Туманни танланг...</option> </select><br>
                <input type="text" name="bpt_address" id="bpt_address" value="{{old('bpt_address')}}" required="required" class="form-control" placeholder="БПТ манзили"><br>

                    <select name="bpt_party_id" id="bpt_party_id" data-plugin="select2" required="required" class="form-control">

                        <option selected disabled>Партияни тангланг...</option>

                        @foreach($councils as $cat)
                            <option value="{{$cat->party_id}}">{{$cat->party_name}}</option>
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