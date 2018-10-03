<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoFeeMembersTable extends Migration
{
    public function up()
    {
        Schema::create('no_fee_members', function (Blueprint $table) {
            $table->increments('fee_id');
            $table->integer('fee_member_id');
            $table->string('fee_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('no_fee_members');
    }
}
