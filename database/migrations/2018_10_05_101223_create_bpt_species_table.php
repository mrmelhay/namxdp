<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBptSpeciesTable extends Migration
{
    public function up()
    {
        Schema::create('bpt_species', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bpt_spec_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bpt_species');
    }
}
