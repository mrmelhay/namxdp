@extends('layouts.main')

@section('content')

    <h5>{{$title}}</h5><br>
    <div>
        @include('commons.errors_list')
    </div>

    <form action="{{url('membership/'.$member->id)}}" method="post">

        <div class="row">

            <div class="col-md-6">{{csrf_field()}}{{method_field('PUT')}}

                <input type="text" required="required" name="fullName" value="{{$member->fullName}}" id="fullName" class="form-control" placeholder="Ф.И.О"><br>

                <input placeholder="Туғилган санаси" type="text" value="{{$member->birthday}}" data-provide="datepicker" required="required" name="birthDay" id="birthDay" class="form-control"><br>

                <p class="sex_p_tag"><label for="">  Аёл  </label><input type="radio" name="sex_id" value="1" {{((int)$member->sex_id==1)?'checked':''}}><label for="">  Эркак  </label><input type="radio" name="sex_id" value="2"{{((int)$member->sex_id==2)?'checked':''}}></p>

                <select name="nationality_id" data-plugin="select2" required="required" id="nationality" class="form-control">
                    <option selected value="{{$member->nationality_id}}">{{$member->nation->nation_name}}</option>
                    @foreach($nations as $nation)
                        <option value="{{$nation->nation_id}}">{{$nation->nation_name}}</option>
                    @endforeach
                </select><br>

                <input type="text" name="passSerial" id="passSerial" value="{{$member->passSerial}}" required="required" class="form-control" placeholder="Паспорт серия ва раками"><br>

                <input placeholder="Паспорт ким томонидан берилган" value="{{$member->passGivenFrom}}" type="text" name="passGivenFrom" id="passGivenFrom" required="required" class="form-control"><br>

                <input placeholder="Паспорт берилган сана" type="text" value="{{$member->passGivenDate}}" data-provide="datepicker" name="passGivenDate" id="passGivenDate" required="required" class="form-control"><br>

                <input placeholder="Паспорт амал қилиш муддати" type="text" value="{{$member->passExpireDate}}" data-provide="datepicker" name="passExpireDate" id="passExpireDate" required="required" class="form-control"><br>

                <input type="text" name="specialist" id="specialist" required="required" value="{{$member->specialist}}" class="form-control" placeholder="Мутахассислиги"><br>

                <input type="text" name="workPlaceAndPosition" id="workPlaceAndPosition" value="{{$member->workPlaceAndPosition}}" required="required" class="form-control" placeholder="Иш жойи ва лавозими"><br>

                <select name="bpt_id" data-plugin="select2" id="" class="form-control">
                    <option value="{{$member->bpt_id}}" selected>{{$member->bpt->bpt_name}}</option>
                    @foreach($bpts as $bpt)
                        <option value="{{$bpt->bpt_id}}">{{$bpt->bpt_name}}</option>
                    @endforeach
                </select><br>

            </div>
            <div class="col-md-6">

                <input type="text" name="phoneNumber" id="phoneNumber" value="{{$member->phoneNumber}}" required="required" class="form-control" placeholder="Телефон рақами"><br>

                <p class="sex_p_tag"><label for="">  Раҳбар </label><input type="radio" value="1" onchange="document.getElementById('xdpMemberArea').style.display='block'" name="isLeader" @if((int)$member->isLeader==1){{'checked'}} {{$tr=1}} @endif><label for="">  Раҳбар эмас </label><input type="radio" value="0" onchange="document.getElementById('xdpMemberArea').style.display='none'" name="isLeader" {{((int)$member->isLeader==0)?'checked':''}}></p>

                <p class="sex_p_tag" id="xdpMemberArea" style="display: {{(isset($tr))?'block':''}}"><label for="">  ХДП аъзоси </label><input type="radio" value="1" name="isXdpMember" {{((int)$member->isXdpMember==1)?'checked':''}}><label for="">  ХДП аъзоси эмас  </label><input type="radio" value="0" name="isXdpMember" {{((int)$member->isXdpMember==0)?'checked':''}}></p>

                <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="region_id" name="" id="">
                    <option selected value="{{$member->region_id}}">{{$member->province->region_name}}</option>
                    @foreach($regions as $region)
                        <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                    @endforeach
                </select><br>

                <select name="district_id" data-plugin="select2" class="form-control" id="response">
                    <option selected value="{{$member->district_id}}">{{$member->district->district_name}}</option>
                </select><br>

                <input type="text" value="{{$member->homeAddress}}" name="homeAddress" class="form-control" placeholder="Манзил (У.Носир кўчаси, 5-уй)"><br>

                <input placeholder="Партияга аъзо бўлган сана" value="{{$member->unionJoinDate}}" type="text" data-provide="datepicker" name="unionJoinDate" id="unionJoinDate" required="required" class="form-control"><br>

                <input type="text" name="unionOrderNumber" value="{{$member->unionOrderNumber}}" id="unionOrderNumber" required="required" class="form-control" placeholder="БПТ йиғилиш қарори рақами"><br>

                <input type="text" name="unionCertfNumber" value="{{$member->unionCertfNumber}}" id="unionCertfNumber" required="required" class="form-control" placeholder="Партия гувохномаси рақами"><br>

                <p class="sex_p_tag"><label for="">  Бадал тўлайди </label><input type="radio" name="isFeePaid" value="1" {{((int)$member->isFeePaid==1)?'checked':''}}><label for="">  Бадал тўламайди </label><input value="0" type="radio" name="isFeePaid" {{((int)$member->isFeePaid==0)?'checked':''}}></p>

                <select name="socialPositionId" id="socialPositionId" data-plugin="select2" required="required" class="form-control">

                @if($member->social_category->soc_id==1001)
                    <option selected disabled>ijtimoiy toifani tanlsh</option>
                    @else
                        <option value="{{$member->social_category->soc_id}}">{{$member->social_category->soc_name}}</option>
                @endif

                    @foreach($soc_cats as $cat)
                        @if($cat->soc_id!=1001)
                            <option value="{{$cat->soc_id}}">{{$cat->soc_name}}</option>
                            @endif
                    @endforeach
                </select><br>

            </div>
        </div>
        <div class="submitButton">
            <a href="{{url('/membership')}}" class="btn btn-default ">Бекор қилиш</a>   <button type="submit" class="btn btn-primary ">Сақлаш</button>
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