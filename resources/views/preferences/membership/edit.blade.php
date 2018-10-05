@extends('layouts.main')

@section('content')

    <h5>{{$title}}</h5><br>
    <div>
        @include('commons.errors_list')
    </div>

    <form action="{{url('membership/'.$member->id)}}" method="post" enctype="multipart/form-data">

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
                <div>
                    <div class="btn-group margin-bottom-20">
                        <label class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" for="inputImage" data-container="body" title="" data-original-title="Сурат юклаш">
                            <input type="file" class="hide" id="inputImage" name="photo" accept="image/*" disabled>
                            <span class="cropper-tooltip" title="Import image with FileReader">
                                    <i class="glyphicon glyphicon-picture" aria-hidden="true"></i> Сурат танлаш
                                </span>
                        </label>
                    </div><br>
                    <div style="position:relative;display: inline-block;">
                        <span class="glyphicon glyphicon-remove" id="removeImg" style="position:absolute;top: -11px;right: -14px;color: #ff2500;cursor: pointer;" title="Ўчириш"></span>
                        <img class="img-rounded img-bordered img-bordered-primary" width="150" height="150" src="{{asset('store/members/'.$member->photo->photo_path)}}" alt="">
                    </div>
                    <input type="hidden" id="member_id" value="{{$member->id}}">
                    <span id="sss" style="margin-left: 15px;padding: 5px; display: none;"></span>
                </div><br>

            </div>
        </div>
        <div class="submitButton">
            <a href="{{url('/membership')}}" class="btn btn-default ">Бекор қилиш</a>   <button type="submit" class="btn btn-primary ">Сақлаш</button>
        </div>

    </form>

    <script>
        var phoneMask = new IMask(
            document.getElementById('passSerial'), {
                mask: '[aa]  000 000 0',
                prepare: function (str) {
                    return str.toUpperCase();
                }
            });

        var phoneMask1 = new IMask(
            document.getElementById('phoneNumber'), {
                mask: '+ {998} (00) 000-00-00',
            });
    </script>
    <script type="text/javascript">
        document.getElementById('removeImg').addEventListener('click',function (e) {
            e.preventDefault()
            var bool = confirm('Суратни ўчирмоқчимисиз ?')
            if(bool){
                var member_id = document.getElementById('member_id').value
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var l = e.target.parentNode
                        console.log(e.target.parentNode.parentNode.removeChild(l))
                        toastr.success("Сурат ўчирилди !")
                        document.getElementById('inputImage').removeAttribute('disabled')
                    }
                };
                xhttp.open("GET", '{{url('api/removeImg')}}/'+member_id, true);
                xhttp.send();
            }
        })

        document.getElementById('inputImage').addEventListener('change' , function (e) {
            e.preventDefault()
            document.getElementById('sss').style.display = 'block';
            document.getElementById('sss').textContent = e.target.value;
        })

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