<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReasonsTable extends Migration
{
    public function up()
    {
        Schema::create('reasons', function (Blueprint $table) {
            $table->increments('reason_id');
            $table->string('reason_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reasons');
    }
}
