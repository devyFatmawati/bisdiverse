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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npm');
            $table->text('no_rfid')->nullable();
            $table->text('no_rfid_cadangan')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('konsentrasi')->nullable();
            $table->string('ipk')->nullable();
            $table->string('kelas')->nullable();
            $table->string('kelas_ujian')->nullable();
            $table->text('no_ktp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabkota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->text('rt')->nullable();
            $table->text('rw')->nullable();
            $table->text('kode_pos')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('ibu_kandung')->nullable();
            $table->string('nama_ot')->nullable();
            $table->string('hubungan_ot')->nullable();
            $table->string('no_telp_ot')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
};
