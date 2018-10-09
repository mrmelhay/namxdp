<ul>
@if(count($errors) > 0)
        @if($errors->first('fullName'))<li>Азонинг исми шарифида хатолик</li>@endif
        @if($errors->first('birthDay'))<li>Азонинг тугилган санасида хатолик</li>@endif
        @if($errors->first('sex_id'))<li>Азонинг жинсида хатолик</li>@endif
        @if($errors->first('nationality_id'))<li>Азонинг миллатида хатолик</li>@endif
        @if($errors->first('passSerial'))<li>Азонинг паспорт сериясида хатолик</li>@endif
        @if($errors->first('passGivenFrom'))<li>Азонинг паспорт берилган жойини тўлиқ езинг</li>@endif
        @if($errors->first('passGivenDate'))<li>Азонинг паспорт берилган санасида хатолик</li>@endif
        @if($errors->first('passExpireDate'))<li>Азонинг паспорт мухлатида хатолик</li>@endif
        @if($errors->first('specialist'))<li>Азонинг сохасида хатолик</li>@endif
        @if($errors->first('workPlaceAndPosition'))<li>Азонинг иш жойи ва лавозимида хатолик</li>@endif
        @if($errors->first('phoneNumber'))<li>Азонинг телефон рақамида хатолик</li>@endif
        @if($errors->first('isLeader'))<li></li>@endif
        @if($errors->first('region_id'))<li>Азонинг вилоятида хатолик</li>@endif
        @if($errors->first('district_id'))<li>Азонинг туманида хатолик</li>@endif
        @if($errors->first('homeAddress'))<li>Азонинг яшаш манзилида хатолик</li>@endif
        @if($errors->first('unionJoinDate'))<li>Азонинг БПТ га қўшилган санасида хатолик</li>@endif
        @if($errors->first('unionOrderNumber'))<li>Азонинг БПТ йигилиш қарори рақамида хатолик</li>@endif
        @if($errors->first('unionCertfNumber'))<li>Азонинг БПТ гувохнома рақамида хатолик</li>@endif
        @if($errors->first('isFeePaid'))<li></li>@endif
        @if($errors->first('bpt_id'))<li>Азонинг БПТ ташкилоти танланмаган</li>@endif
        @if($errors->first('socialPositionId'))<li>Азонинг ижтимоий тоифасида хатолик</li>@endif

        @if($errors->first('bpt_name'))<li>БПТ номида хатолик</li>@endif
        @if($errors->first('speciality'))<li>БПТ сохасида хатолик</li>@endif
        @if($errors->first('bpt_address'))<li>БПТ манзилида хатолик</li>@endif
        @if($errors->first('bpt_is_mfy'))<li></li>@endif
        @if($errors->first('bpt_region_id'))<li>БПТ вилоятида хатолик</li>@endif
        @if($errors->first('bpt_district_id'))<li>БПТ туманида хатолик</li>@endif
        @if($errors->first('bpt_party_id'))<li>Партия танлашда хатолик</li>@endif

            @if($errors->first('party_name'))<li>Партия номида хатолик</li>@endif
            @if($errors->first('party_address'))<li>Партия манзилида хатолик</li>@endif
            @if($errors->first('party_director'))<li>Партия рахбарида хатолик</li>@endif
            @if($errors->first('party_phone'))<li>Партия телефон рақамида хатолик</li>@endif
            @if($errors->first('party_region_id'))<li>Партия вилоятида хатолик</li>@endif
            @if($errors->first('party_distirict_id'))<li>Партия туманида хатолик</li>@endif

            @if($errors->first('name'))<li>Исмида хатолик</li>@endif
            @if($errors->first('email'))<li>имейлида хатолик</li>@endif
            @if($errors->first('password'))<li>Махфий калитда хатолик</li>@endif
            @if($errors->first('role_id'))<li>Мавқесида хатолик</li>@endif
            @if($errors->first('bpt_spec_name'))<li>БПТ сохасида хатолик</li>@endif


@endif

</ul>

