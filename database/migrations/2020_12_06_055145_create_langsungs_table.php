<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangsungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langsungs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_donatur');
            $table->string('email_mahasiswa');
            $table->double('jumlah_donasi');
            $table->double('total');
            $table->integer('aturan');
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
        Schema::dropIfExists('langsungs');
    }
}
