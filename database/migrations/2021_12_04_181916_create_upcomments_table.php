<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcomments', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz')->nullable();
            $table->string('title_ru')->nullable();
            $table->longText('text_uz')->nullable();
            $table->longText('text_ru')->nullable();
            $table->string('choose');
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('type')->nullable();                 
            $table->string('data')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('upcomments');
    }
}
