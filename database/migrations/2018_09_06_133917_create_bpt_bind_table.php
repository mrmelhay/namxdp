<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBptBindTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpt_bind', function (Blueprint $table) {
            $table->increments('bpt_bind_id');
            $table->integer("bpt_id");
            $table->integer("bpt_person_count");
            $table->integer("bpt_person_count_date");
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
        Schema::dropIfExists('bpt_bind');
    }
}
