<ul>
        @if(count($errors))
        @if($errors->first('fullName'))<li><?php echo $errors->first('fullName'); ?></li>@endif
        @if($errors->first('birthDay'))<li><?php echo $errors->first('birthDay'); ?></li>@endif
        @if($errors->first('sex_id'))<li><?php echo $errors->first('sex_id'); ?></li>@endif
        @if($errors->first('nationality_id'))<li><?php echo $errors->first('nationality_id'); ?></li>@endif
        @if($errors->first('passSerial'))<li><?php echo $errors->first('passSerial'); ?></li>@endif
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
        @if($errors->first('bpt_id'))<li><?php echo $errors->first('bpt_id'); ?></li>@endif
        @if($errors->first('socialPositionId'))<li><?php echo $errors->first('socialPositionId'); ?></li>@endif

        @if($errors->first('bpt_name'))<li><?php echo $errors->first('bpt_name'); ?></li>@endif
        @if($errors->first('speciality'))<li><?php echo $errors->first('speciality'); ?></li>@endif
        @if($errors->first('bpt_address'))<li><?php echo $errors->first('bpt_address'); ?></li>@endif
        @if($errors->first('bpt_is_mfy'))<li><?php echo $errors->first('bpt_is_mfy'); ?></li>@endif
        @if($errors->first('bpt_region_id'))<li><?php echo $errors->first('bpt_region_id'); ?></li>@endif
        @if($errors->first('bpt_district_id'))<li><?php echo $errors->first('bpt_district_id'); ?></li>@endif
        @if($errors->first('bpt_party_id'))<li><?php echo $errors->first('bpt_party_id'); ?></li>@endif

            @if($errors->first('party_name'))<li><?php echo $errors->first('party_name'); ?></li>@endif
            @if($errors->first('party_address'))<li><?php echo $errors->first('party_address'); ?></li>@endif
            @if($errors->first('party_director'))<li><?php echo $errors->first('party_director'); ?></li>@endif
            @if($errors->first('party_phone'))<li><?php echo $errors->first('party_phone'); ?></li>@endif
            @if($errors->first('party_region_id'))<li><?php echo $errors->first('party_region_id'); ?></li>@endif
            @if($errors->first('party_distirict_id'))<li><?php echo $errors->first('party_distirict_id'); ?></li>@endif



            @if($errors->first('name'))<li><?php echo $errors->first('name'); ?></li>@endif
            @if($errors->first('email'))<li><?php echo $errors->first('email'); ?></li>@endif
            @if($errors->first('password'))<li><?php echo $errors->first('password'); ?></li>@endif
            @if($errors->first('role_id'))<li><?php echo $errors->first('role_id'); ?></li>@endif




</ul>
@endif
