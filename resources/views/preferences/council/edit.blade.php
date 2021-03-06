@extends('layouts.main')

@section('content')

    <div>
        @include('commons.errors_list')
    </div>

    <form action="{{url('/council').'/'.$council->party_id}}" method="post">

        <div class="row">

            <div class="col-md-6">
                {{csrf_field()}}
                {{method_field('PUT')}}

                <input type="text" required="required" name="party_name" value="{{$council->party_name}}" id="party_name" class="form-control" placeholder="Партия номи"><br>

                <input placeholder="Партия рахбари" type="text" value="{{$council->party_director}}" required="required" name="party_director" id="party_address" class="form-control"><br>

                <input placeholder="Партия телефон раками" type="text" value="{{$council->party_phone}}" required="required" name="party_phone" id="party_phone" class="form-control"><br>

                <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="party_region_id" name="" id="">
                    <option disabled selected>Вилоятни танланг...</option>
                    <option value="{{$council->party_region_id}}" selected>{{$council->region->region_name}}</option>
                    @foreach($regions as $region)
                        <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                    @endforeach
                </select><br>

                <select name="party_distirict_id" data-plugin="select2" class="form-control" id="response">
                    <option value="{{$council->party_distirict_id}}" selected>{{$council->distirict->district_name}}</option>
                    <option disabled>Туманни танланг...</option>
                </select><br>

                <input placeholder="Партия манзили" type="text" value="{{$council->party_address}}" required="required" name="party_address" id="party_address" class="form-control"><br>

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