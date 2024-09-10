<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPasswordResetsTable extends Migration
{
    public function up()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            // Change column length or modify index here
            $table->string('email', 191)->change();
        });
    }

    public function down()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            // Revert the changes if necessary
        });
    }
}
