<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBptContactBindTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpt_contact_bind', function (Blueprint $table) {
            $table->increments('btp_has_id');
            $table->integer("bpt_has_contact");
            $table->date("bpt_has_contact_date");
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
        Schema::dropIfExists('bpt_contact_bind');
    }
}
