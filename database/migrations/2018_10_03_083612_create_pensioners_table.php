<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensionersTable extends Migration
{
    public function up()
    {
        Schema::create('pensioners', function (Blueprint $table) {
            $table->increments('pernsioner_id');
            $table->string('pensioner_date');
            $table->string('is_deleted')->value(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pensioners');
    }
}
