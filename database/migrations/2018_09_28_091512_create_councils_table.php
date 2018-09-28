<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouncilsTable extends Migration
{

    public function up()
    {
        Schema::create('coucils', function (Blueprint $table) {
            $table->boolean('isFeePaid');
            $table->integer('socialPosition_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        //
    }
}
