<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ujians', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_ujian');
            $table->string('matkul_kode');
            $table->string('dosen_kds');
            $table->string('kelas');
            $table->string('kelas_ujian');
            $table->string('ruangan');
            $table->date('tgl_ujian');
            $table->time('jam_mulai_ujian');
            $table->time('jam_berakhir_ujian');
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
        Schema::dropIfExists('jadwal_ujians');
    }
};
