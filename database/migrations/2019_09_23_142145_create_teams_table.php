<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_tim')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->integer('jumlah_anggota')->nullable();
            $table->bigInteger('competition_id')->unsigned()->nullable();
            $table->foreign('competition_id')->references('id')->on('competitions')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('lolos_final')->nullable();
            $table->integer('juara')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('teams');
        Schema::enableForeignKeyConstraints();
    }
}
