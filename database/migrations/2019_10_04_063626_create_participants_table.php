<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nisn');
            $table->string('nama_file_foto');
            $table->string('nama_file_kartu');
            $table->string('no_telp');
            $table->string('no_wa');
            $table->bigInteger('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('participants');
        Schema::enableForeignKeyConstraints();
    }
}
