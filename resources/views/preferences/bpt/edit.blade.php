@extends('layouts.main')

@section('content')

    <div>
        @include('commons.errors_list')
    </div>

    <form action="{{url('/bpt')}}" method="post">

        <div class="row">

            <div class="col-md-6">{{csrf_field()}}{{method_field('PUT')}}

                <input type="text" required="required" name="bpt_name" value="{{$bpt->bpt_name}}" id="bpt_name" class="form-control" placeholder="Bpt nomi"><br>

                <input placeholder="Bpt sohasi" type="text" value="{{$bpt->bpt_speciality}}" required="required" name="bpt_speciality" id="bpt_speciality" class="form-control"><br>

                <p class="sex_p_tag"><label for="">  M.F.Y  </label><input type="radio" {{((int)$bpt->bpt_is_mfy==1)?'checked':''}} name="bpt_is_mfy" value="1"><label for="">  M.F.Y emas  </label><input type="radio" name="bpt_is_mfy" {{((int)$bpt->bpt_is_mfy==0)?'checked':''}} value="0"></p>

                <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="bpt_region_id" name="" id="">
                    <option disabled selected>Viloyatni tanlash</option>
                    @foreach($regions as $region)
                        <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                    @endforeach
                </select><br>

                <select name="bpt_district_id" data-plugin="select2" class="form-control" id="response">
                    <option selected disabled>Tumanni tanlash</option> </select><br>
                <input type="text" name="bpt_address" id="bpt_address" value="{{old('bpt_address')}}" required="required" class="form-control" placeholder="Bpt manzili"><br>

                <input type="text" name="bpt_speciality" id="bpt_speciality" required="required" value="{{old('bpt_speciality')}}" class="form-control" placeholder="Мутахассислиги"><br>

                <select name="bpt_party_id" id="bpt_party_id" data-plugin="select2" required="required" class="form-control">

                    <option selected disabled>Partiyani tanlash</option>

                    @foreach($councils as $cat)
                        <option value="{{$cat->party_id}}">{{$cat->party_name}}</option>
                    @endforeach

                </select><br>
                <div class="submitButton">
                    <button type="submit" class="btn btn-primary ">Saqlash</button>
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