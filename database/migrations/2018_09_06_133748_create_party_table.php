<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('party', function (Blueprint $table) {
            $table->increments('party_id');
            $table->string("party_name");
            $table->string("party_address");
            $table->string("party_director");
            $table->string("party_phone");
            $table->integer("party_region");
            $table->integer("party_distirict");
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
        Schema::dropIfExists('party');
    }
}
