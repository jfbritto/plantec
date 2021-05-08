<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_specie')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('start_time', 45)->nullable();
            $table->string('end_time', 45)->nullable();
            $table->string('status', 5)->default('A');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('plantations');
    }
}
