@extends('layouts.main')

@section('content')

            <h5>{{$title}}</h5><br>
            <div>
                <ul>@if(count($errors))
                        @if($errors->first('fullName'))<li><?php echo $errors->first('fullName'); ?></li>@endif
                            @if($errors->first('fullName'))<li><?php echo $errors->first('birthDay'); ?></li>@endif
                    @if($errors->first('fullName'))<li><?php echo $errors->first('sex_id'); ?></li>@endif
                    @if($errors->first('nationality'))<li><?php echo $errors->first('nationality'); ?></li>@endif
                    @if($errors->first('passInfo'))<li><?php echo $errors->first('passInfo'); ?></li>@endif
                    @if($errors->first('passGivenFrom'))<li><?php echo $errors->first('passGivenFrom'); ?></li>@endif
                    @if($errors->first('passGivenDate'))<li><?php echo $errors->first('passGivenDate'); ?></li>@endif
                    @if($errors->first('passExpireDate'))<li><?php echo $errors->first('passExpireDate'); ?></li>@endif
                    @if($errors->first('specialist'))<li><?php echo $errors->first('specialist'); ?></li>@endif
                    @if($errors->first('workPlaceAndPosition'))<li><?php echo $errors->first('workPlaceAndPosition'); ?></li>@endif
                    @if($errors->first('phoneNumber'))<li><?php echo $errors->first('phoneNumber'); ?></li>@endif
                    @if($errors->first('isLeader'))<li><?php echo $errors->first('isLeader'); ?></li>@endif
                    @if($errors->first('region_id'))<li><?php echo $errors->first('region_id'); ?></li>@endif
                    @if($errors->first('district_id'))<li><?php echo $errors->first('district_id'); ?></li>@endif
                    @if($errors->first('homeAddress'))<li><?php echo $errors->first('homeAddress'); ?></li>@endif
                    @if($errors->first('unionJoinDate'))<li><?php echo $errors->first('unionJoinDate'); ?></li>@endif
                    @if($errors->first('unionOrderNumber'))<li><?php echo $errors->first('unionOrderNumber'); ?></li>@endif
                        @if($errors->first('unionCertfNumber'))<li><?php echo $errors->first('unionCertfNumber'); ?></li>@endif
                    @if($errors->first('isFeePaid'))<li><?php echo $errors->first('isFeePaid'); ?></li>@endif
                        @if($errors->first('socialPosition'))<li><?php echo $errors->first('socialPosition'); ?></li>@endif
                </ul>@endif
            </div>

            <form action="{{url('/membership')}}" method="post">

                <div class="row">

                <div class="col-md-6">{{csrf_field()}}{{method_field('POST')}}

                <input type="text" required="required" name="fullName" value="{{old('fullName')}}" id="fullName" class="form-control" placeholder="Ф.И.О"><br>

                <input placeholder="Tug'ilgan sanasi" type="text" value="{{old('birthDay')}}" onfocus="(this.type='date')" required="required" name="birthDay" id="birthDay" class="form-control"><br>

                <p class="sex_p_tag"><label for="">  Ayol  </label><input type="radio" name="sex_id" value="1" checked><label for="">  Erkak  </label><input type="radio" name="sex_id" value="2"></p>

                <select name="nationality" required="required" value="{{old('nationality')}}" id="nationality" class="form-control">
                    <option selected disabled>Millati</option>
                    @foreach($nations as $nation)
                        <option value="{{$nation->nation_id}}">{{$nation->nation_name}}</option>
                    @endforeach
                </select><br>

                <input type="text" name="passInfo" id="passInfo" value="{{old('passInfo')}}" required="required" class="form-control" placeholder="Паспорт серия ва раками"><br>

                <input placeholder="Passport kim tomonidan berilgan" value="{{old('passGivenFrom')}}" type="text" name="passGivenFrom" id="passGivenFrom" required="required" class="form-control"><br>

                <input placeholder="Passport berilgan sana" type="text" value="{{old('passGivenDate')}}" onfocus="(this.type='date')" name="passGivenDate" id="passGivenDate" required="required" class="form-control"><br>

                <input placeholder="Passport muddati tugash sanasi" type="text" value="{{old('passExpireDate')}}" onfocus="(this.type='date')" name="passExpireDate" id="passExpireDate" required="required" class="form-control"><br>

                <input type="text" name="specialist" id="specialist" required="required" value="{{old('specialist')}}" class="form-control" placeholder="Мутахассислиги"><br>

                <input type="text" name="workPlaceAndPosition" id="workPlaceAndPosition" value="{{old('workPlaceAndPosition')}}" required="required" class="form-control" placeholder="Иш жойи ва лавозими"><br>

                </div>
                <div class="col-md-6">

                <input type="text" name="phoneNumber" id="phoneNumber" value="{{old('phoneNumber')}}" required="required" class="form-control" placeholder="Тел рақами"><br>

                <p class="sex_p_tag"><label for="">  Rahbar  </label><input type="radio" value="1" onchange="document.getElementById('xdpMemberArea').style.display='block'" name="isLeader"><label for="">  Rahbar emas  </label><input type="radio" value="0" onchange="document.getElementById('xdpMemberArea').style.display='none'" name="isLeader" checked></p>

                <p class="sex_p_tag" id="xdpMemberArea"><label for="">  XDP a'zosi  </label><input type="radio" value="1" name="isXdpMember"><label for="">  XDP a'zosi emas  </label><input type="radio" value="0" name="isXdpMember" checked></p>

                <select class="form-control" value="{{old('region_id')}}" onchange="getDistrict(this)" name="region_id" name="" id="">
                    <option disabled selected>Viloyatni tanlash</option>
                    @foreach($regions as $region)
                        <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                    @endforeach
                </select><br>

                <select name="district_id" value="{{old('district_id')}}" class="form-control" id="response"></select><br>

                <input type="text" value="{{old('homeAddress')}}" name="homeAddress" class="form-control" placeholder="5 - Komil Yormatov ko'chasi, uy 34"><br>

                <input placeholder="Partiyaga azo bo'lgan sana" value="{{old('unionJoinDate')}}" type="text" onfocus="(this.type='date')" name="unionJoinDate" id="unionJoinDate" required="required" class="form-control"><br>

                <input type="number" name="unionOrderNumber" value="{{old('unionOrderNumber')}}" id="unionOrderNumber" required="required" class="form-control" placeholder="БПТ йиғилиш қарори рақами"><br>

                <input type="number" name="unionCertfNumber" value="{{old('unionCertfNumber')}}" id="unionCertfNumber" required="required" class="form-control" placeholder="Партия гувохномаа рақами"><br>

                <p class="sex_p_tag"><label for="">  Badal to'laydi  </label><input type="radio" name="isFeePaid" value="1" checked><label for="">  Badal to'lamaydi  </label><input value="0" type="radio" name="isFeePaid"></p>

                <select name="socialPosition" id="socialPosition" value="{{old('socialPosition')}}" required="required" class="form-control">

                    <option selected disabled>Ижтимоий тоифаси</option>

                    <option value="1">Пенсионер</option>

                    <option value="2">Tалаба</option>

                    <option value="3">Hогирон</option>

                    <option value="4">Ижтимоий кам таъминланган</option>

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