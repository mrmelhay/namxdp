<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->string('birthday');
            $table->string('sex_id');
            $table->integer('nationality_id');
            $table->string('passInfo');
            $table->string('passGivenFrom');
            $table->string('passGivenDate');
            $table->string('passExpireDate');
            $table->string('specialist');
            $table->string('workPlaceAndPosition');
            $table->integer('phoneNumber')->unique();
            $table->boolean('isLeader');
            $table->boolean('isXdpMember')->nullable();
            $table->integer('region_id');
            $table->integer('district_id');
            $table->string('homeAddress');
            $table->string('unionJoinDate');
            $table->integer('unionOrderNumber');
            $table->boolean('isFeePaid');
            $table->integer('socialPosition_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
}