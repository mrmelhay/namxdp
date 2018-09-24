<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bpt_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('birthday');
            $table->integer('sex')->index();
            $table->integer('national')->index();
            $table->string('passort_seria_number');
            $table->string('passort_kim_tomoindan');
            $table->string('specialty');
            $table->string('ishjoyi_lavozimi');
            $table->integer('region_id');
            $table->integer('district_id');
            $table->string('address');
            $table->string("phone")->nullable();
            $table->date('membersdate');
            $table->string('qaror_number')->nullable();
            $table->string('party_number');
            $table->integer('community_id')->index();
            $table->integer('is_party');
            $table->integer('is_director');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
