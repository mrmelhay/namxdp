@extends('layouts.main')

@section('content')

            <h5>{{$title}}</h5><br>
            <div>
                @include('commons.errors_list')
            </div>

            <form action="{{url('/membership')}}" method="post">

                <div class="row">

                <div class="col-md-6">{{csrf_field()}}{{method_field('POST')}}

                <input type="text" required="required" name="fullName" value="{{old('fullName')}}" id="fullName" class="form-control" placeholder="Ф.И.О"><br>

                <input placeholder="Tug'ilgan sanasi" type="text" value="{{old('birthDay')}}" data-provide="datepicker" required="required" name="birthDay" id="birthDay" class="form-control"><br>

                <p class="sex_p_tag"><label for="">  Ayol  </label><input type="radio" name="sex_id" value="1" checked><label for="">  Erkak  </label><input type="radio" name="sex_id" value="2"></p>

                <select name="nationality_id" data-plugin="select2" required="required" id="nationality" class="form-control">
                    <option selected disabled>Millati</option>
                    @foreach($nations as $nation)
                        <option value="{{$nation->nation_id}}">{{$nation->nation_name}}</option>
                    @endforeach
                </select><br>

                <input type="text" name="passSerial" id="passSerial" value="{{old('passSerial')}}" required="required" class="form-control" placeholder="Паспорт серия ва раками"><br>

                <input placeholder="Passport kim tomonidan berilgan" value="{{old('passGivenFrom')}}" type="text" name="passGivenFrom" id="passGivenFrom" required="required" class="form-control"><br>

                <input placeholder="Passport berilgan sana" type="text" value="{{old('passGivenDate')}}" data-provide="datepicker" name="passGivenDate" id="passGivenDate" required="required" class="form-control"><br>

                <input placeholder="Passport muddati tugash sanasi" type="text" value="{{old('passExpireDate')}}" data-provide="datepicker" name="passExpireDate" id="passExpireDate" required="required" class="form-control"><br>

                <input type="text" name="specialist" id="specialist" required="required" value="{{old('specialist')}}" class="form-control" placeholder="Мутахассислиги"><br>

                <input type="text" name="workPlaceAndPosition" id="workPlaceAndPosition" value="{{old('workPlaceAndPosition')}}" required="required" class="form-control" placeholder="Иш жойи ва лавозими"><br>

                    <select name="bpt_id" data-plugin="select2" id="" class="form-control">
                        <option selected disabled>BPTni tanlash</option>
                        @foreach($bpts as $bpt)
                            <option value="{{$bpt->bpt_id}}">{{$bpt->bpt_name}}</option>
                        @endforeach
                    </select><br>

                </div>
                <div class="col-md-6">

                <input type="text" name="phoneNumber" id="phoneNumber" value="{{old('phoneNumber')}}" required="required" class="form-control" placeholder="Тел рақами"><br>

                <p class="sex_p_tag"><label for="">  Rahbar  </label><input type="radio" value="1" onchange="document.getElementById('xdpMemberArea').style.display='block'" name="isLeader"><label for="">  Rahbar emas  </label><input type="radio" value="0" onchange="document.getElementById('xdpMemberArea').style.display='none'" name="isLeader" checked></p>

                <p class="sex_p_tag" id="xdpMemberArea"><label for="">  XDP a'zosi  </label><input type="radio" value="1" name="isXdpMember"><label for="">  XDP a'zosi emas  </label><input type="radio" value="0" name="isXdpMember" checked></p>

                <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="region_id" name="" id="">
                    <option disabled selected>Viloyatni tanlash</option>
                    @foreach($regions as $region)
                        <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                    @endforeach
                </select><br>

                <select name="district_id" data-plugin="select2" class="form-control" id="response">
                    <option selected disabled>Tumanni tanlash</option> </select><br>

                <input type="text" value="{{old('homeAddress')}}" name="homeAddress" class="form-control" placeholder="5 - Komil Yormatov ko'chasi, uy 34"><br>

                <input placeholder="Partiyaga azo bo'lgan sana" value="{{old('unionJoinDate')}}" type="text" data-provide="datepicker" name="unionJoinDate" id="unionJoinDate" required="required" class="form-control"><br>

                <input type="number" name="unionOrderNumber" value="{{old('unionOrderNumber')}}" id="unionOrderNumber" required="required" class="form-control" placeholder="БПТ йиғилиш қарори рақами"><br>

                <input type="number" name="unionCertfNumber" value="{{old('unionCertfNumber')}}" id="unionCertfNumber" required="required" class="form-control" placeholder="Партия гувохномаа рақами"><br>

                <p class="sex_p_tag"><label for="">  Badal to'laydi  </label><input type="radio" name="isFeePaid" value="1" checked><label for="">  Badal to'lamaydi  </label><input value="0" type="radio" name="isFeePaid"></p>

                <select name="socialPositionId" id="socialPositionId" data-plugin="select2" required="required" class="form-control">

                    <option selected disabled>Ижтимоий тоифаси</option>

                    @foreach($soc_cats as $cat)
                        <option value="{{$cat->soc_id}}">{{$cat->soc_name}}</option>
                    @endforeach

                </select><br>

                </div>
                </div>
                <div class="submitButton">
                    <button type="submit" class="btn btn-primary ">Saqlash</button>
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