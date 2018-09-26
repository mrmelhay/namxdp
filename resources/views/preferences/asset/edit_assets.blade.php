@extends('layouts.main')

@section('content')

            <h5>Аъзолар тўғрисида маълумотлар</h5><br>
            <form>{{csrf_field()}}{{method_field('POST')}}

                <div class="row">

                <div class="col-md-6">

                <input type="text" required="required" name="fullName" id="fullName" class="form-control" placeholder="Ф.И.О"><br>

                <input placeholder="Tug'ilgan sanasi" type="text" onfocus="(this.type='date')" required="required" name="birthDay" id="birthDay" class="form-control"><br>

                <p class="sex_p_tag"><label for="">  Ayol  </label><input type="radio" name="sex" checked><label for="">  Erkak  </label><input type="radio" name="sex"></p>

                <input type="text" name="nationality" required="required" id="nationality" class="form-control" placeholder="Mиллати"><br>

                <input type="text" name="passInfo" id="passInfo" required="required" class="form-control" placeholder="Паспорт серия ва раками"><br>

                <input placeholder="Passport kim tomonidan berilgan" type="text" name="passGivenFrom" id="passGivenFrom" required="required" class="form-control"><br>

                <input placeholder="Passport berilgan sana" type="text" onfocus="(this.type='date')" name="passGivenDate" id="passGivenDate" required="required" class="form-control"><br>

                <input placeholder="Passport muddati tugash sanasi" type="text" onfocus="(this.type='date')" name="passExpireDate" id="passExpireDate" required="required" class="form-control"><br>

                <input type="text" name="specialist" id="specialist" required="required" class="form-control" placeholder="Мутахассислиги"><br>

                    </div>
                <div class="col-md-6">


                <input type="text" name="workPlaceAndPosition" id="workPlaceAndPosition" required="required" class="form-control" placeholder="Иш жойи ва лавозими"><br>

                <p class="sex_p_tag"><label for="">  Rahbar  </label><input type="radio" onchange="document.getElementById('xdpMemberArea').style.display='block'" name="isLeader"><label for="">  Rahbar emas  </label><input type="radio" onchange="document.getElementById('xdpMemberArea').style.display='none'" name="isLeader" checked></p>

                <p class="sex_p_tag" id="xdpMemberArea"><label for="">  XDP a'zosi  </label><input type="radio" name="isXdpMember"><label for="">  XDP a'zosi emas  </label><input type="radio" name="isXdpMember" checked></p>

                <input type="text" name="homeAdress" id="homeAdress" required="required" class="form-control" placeholder="Яшаш манзили"><br>

                <input type="text" name="phoneNumber" id="phoneNumber" required="required" class="form-control" placeholder="Тел рақами"><br>

                <input placeholder="Partiyaga azo bo'lgan sana" type="text" onfocus="(this.type='date')" name="unionJoinDate" id="unionJoinDate" required="required" class="form-control"><br>

                <input type="number" name="unionOrderNumber" id="unionOrderNumber" required="required" class="form-control" placeholder="БПТ йиғилиш қарори рақами"><br>

                <input type="number" name="unionCertfNumber" id="unionCertfNumber" required="required" class="form-control" placeholder="Партия гувохномаа рақами"><br>

                <p class="sex_p_tag"><label for="">  Badal to'langan  </label><input type="radio" name="isFeePaid"><label for="">  Badal to'lanmagan  </label><input type="radio" name="isFeePaid" checked></p>

                <select name="phoneNumber" id="phoneNumber" required="required" class="form-control">

                    <option selected disabled>Ижтимоий тоифаси</option>

                    <option value="pensioner">Пенсионер</option>

                    <option value="student">Tалаба</option>

                    <option value="invalid">Hогирон</option>

                    <option value="socialLowIncome">Ижтимоий кам таъминланган</option>

                </select><br>

                </div>
                </div>
                <div class="submitButton">
                    <a href="" type="submit" class="btn btn-primary ">Saqlash</a>
                </div>

            </form>

@endsection