<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docteurs', function (Blueprint $table) {
           $table->increments('id_docteur');
            $table->String('login');
            $table->String('password');
            $table->String('firstname');
            $table->String('lastname');
            $table->integer('connecte');
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
        Schema::dropIfExists('docteurs');
    }
}
