<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

         Schema::create('songs', function (Blueprint $table) {
             $table->increments('id');
            $table->string('songname');
            $table->string('album')->nullable();
            $table->text('lyrics');
            $table->string('artistname');
            $table->string('artistimage')->nullable(); // To store the image path
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
        //
         Schema::dropIfExists('songs');
    }
}


