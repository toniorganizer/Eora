<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_mhs');
            $table->integer('id_adm');
            $table->double('tanggungan');
            $table->string('file_tanggungan');
            $table->double('nilai');
            $table->string('file_nilai');
            $table->double('penghasilan');
            $table->string('file_penghasilan');
            $table->double('prestasi_akd');
            $table->string('file_pekad');
            $table->double('prestasi_nonakd');
            $table->string('file_penon');
            $table->string('role');
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
        Schema::dropIfExists('kriteria');
    }
}
