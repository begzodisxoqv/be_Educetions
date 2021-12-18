<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogotechsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logotechs', function (Blueprint $table) {
            $table->id();
            $table->string('location_uz')->nullable();
            $table->string('location_ru')->nullable();
            $table->string('phone')->nullable();
            $table->string('houre_uz')->nullable();
            $table->string('houre_ru')->nullable();
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
        Schema::dropIfExists('logotechs');
    }
}
