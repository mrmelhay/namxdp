<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpt', function (Blueprint $table) {
            $table->increments('bpt_id');
            $table->string("bpt_name");
            $table->string("bpt_speciality");
            $table->string("bpt_address");
            $table->integer("bpt_is_mfy");
            $table->integer("bpt_region_id");
            $table->integer("bpt_district_id");
            $table->integer("bpt_party_id");
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
        Schema::dropIfExists('bpt');
    }
}
