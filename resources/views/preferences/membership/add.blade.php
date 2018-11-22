@extends('layouts.main')

@section('content')

    <div>
        <h5>{{$title}}</h5><br>
        <div>
            @include('commons.errors_list')
        </div>
    </div>
            <form class="row" action="{{url('/membership')}}" method="post" enctype="multipart/form-data">
                <div>
                    <div class="col-md-6">{{csrf_field()}}{{method_field('POST')}}

                        <input type="text" required="required" name="fullName" value="{{old('fullName')}}" id="fullName" class="form-control" placeholder="Ф.И.О"><br>

                        <input placeholder="Туғилган санаси" type="text" value="{{old('birthDay')}}" data-provide="datepicker" required="required" name="birthDay" id="birthDay" class="form-control"><br>

                        <p class="sex_p_tag">
                            <label for="">  Аёл  </label>
                            <input type="radio" id="inputBasicFeMale" name="sex_id" value="1" checked>
                            <label for="">  Эркак  </label>
                            <input type="radio" id="inputBasicMale" name="sex_id" value="2">
                        </p>

                        <select name="nationality_id" data-plugin="select2" required="required" id="nationality" class="form-control">
                            <option selected disabled>Миллати...</option>
                            @foreach($nations as $nation)
                                <option value="{{$nation->nation_id}}">{{$nation->nation_name}}</option>
                            @endforeach
                        </select><br>

                        <input type="text" name="passSerial" id="passSerial" value="{{old('passSerial')}}" required="required" class="form-control" placeholder="Паспорт серия ва раками"><br>

                        <input placeholder="Паспорт ким томонидан берилган" value="{{old('passGivenFrom')}}" type="text" name="passGivenFrom" id="passGivenFrom" required="required" class="form-control"><br>

                        <input placeholder="Паспорт берилган сана" type="text" value="{{old('passGivenDate')}}" data-provide="datepicker" name="passGivenDate" id="passGivenDate" required="required" class="form-control"><br>

                        <input placeholder="Паспорт амал қилиш муддати" type="text" value="{{old('passExpireDate')}}" data-provide="datepicker" name="passExpireDate" id="passExpireDate" required="required" class="form-control"><br>

                        <input type="text" name="specialist" id="specialist" required="required" value="{{old('specialist')}}" class="form-control" placeholder="Мутахассислиги"><br>

                        <input type="text" name="workPlaceAndPosition" id="workPlaceAndPosition" value="{{old('workPlaceAndPosition')}}" required="required" class="form-control" placeholder="Иш жойи ва лавозими"><br>

                        <select name="bpt_id" data-plugin="select2" id="" class="form-control">
                            <option selected disabled>БПТни танланг...</option>
                            @foreach($bpts as $bpt)
                                <option value="{{$bpt->bpt_id}}">{{$bpt->bpt_name}}</option>
                            @endforeach
                        </select><br>

                    </div>
                    <div class="col-md-6">

                        <input type="text" name="phoneNumber" id="phoneNumber" value="{{old('phoneNumber')}}" required="required" class="form-control" placeholder="Телефон рақами"><br>

                        <p class="sex_p_tag"><label for="">  Раҳбар  </label><input type="radio" value="1" onchange="document.getElementById('xdpMemberArea').style.display='block'" name="isLeader"><label for="">  Раҳбар эмас </label><input type="radio" value="0" onchange="document.getElementById('xdpMemberArea').style.display='none'" name="isLeader" checked></p>

                        <p class="sex_p_tag" id="xdpMemberArea"><label for="">  ХДП аъзоси </label><input type="radio" value="1" name="isXdpMember"><label for="">  ХДП аъзоси эмас </label><input type="radio" value="0" name="isXdpMember" checked></p>

                        <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="region_id" name="" id="">
                    <option disabled selected>Вилоятни танланг...</option>
                    @foreach($regions as $region)
                        <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                    @endforeach
                </select><br>

                        <select name="district_id" data-plugin="select2" class="form-control" id="response">
                            <option selected disabled>Туманни тангланг...</option> </select><br>

                        <input type="text" value="{{old('homeAddress')}}" name="homeAddress" class="form-control" placeholder="Манзил (У.Носир кўчаси, 5-уй)"><br>

                        <input placeholder="Партияга аъзо бўлган сана" value="{{old('unionJoinDate')}}" type="text" data-provide="datepicker" name="unionJoinDate" id="unionJoinDate" required="required" class="form-control"><br>

                        <input type="text" name="unionOrderNumber" value="{{old('unionOrderNumber')}}" id="unionOrderNumber" required="required" class="form-control" placeholder="БПТ йиғилиш қарори рақами"><br>

                        <input type="text" name="unionCertfNumber" value="{{old('unionCertfNumber')}}" id="unionCertfNumber" required="required" class="form-control" placeholder="Партия гувохномаси рақами"><br>

                        <p class="sex_p_tag"><label for="">  Бадал тўлайди </label><input type="radio" name="isFeePaid" value="1" checked><label for="">  Бадал тўламайди </label><input value="0" type="radio" name="isFeePaid"></p>

                        <select name="socialPositionId" onchange="document.getElementById('first_pos_id').value=this.value" id="socialPositionId" data-plugin="select2" class="form-control">

                    <option selected disabled>Ижтимоий тоифаси</option>

                    @foreach($soc_cats as $cat)
                        <option value="{{$cat->soc_id}}">{{$cat->soc_name}}</option>
                    @endforeach

                </select><br>
                        <input type="hidden" name="first_pos_id" id="first_pos_id">
                        <div>
                            <div class="btn-group margin-bottom-20">
                                <label class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" for="inputImage" data-container="body" title="" data-original-title="Сурат танлаш">
                                    <input type="file" class="hide" id="inputImage" name="photo" accept="image/*">
                                    <span class="cropper-tooltip" title="Import image with FileReader">
                                    <i class="glyphicon glyphicon-picture" aria-hidden="true"></i> Сурат танлаш
                                </span>
                                </label>
                            </div>
                            <span id="sss" style="margin-left: 15px;padding: 5px; display: none;"></span>
                        </div>
                        <br>
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

                document.getElementById('inputImage').addEventListener('change' , function (e) {
                    e.preventDefault()
                    document.getElementById('sss').style.display = 'block';
                    document.getElementById('sss').textContent = e.target.value;
                })
            </script>

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