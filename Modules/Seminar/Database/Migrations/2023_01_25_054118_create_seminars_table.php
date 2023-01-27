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
        Schema::create('seminars', function (Blueprint $table) {
            $table->id();
            $table->text('mahasiswa_npm');
            $table->text('konsentrasi');
            $table->text('judul_penelitian');
            $table->text('kds_dosen');
            $table->text('anggota_dosen');
            $table->text('proposal');
            $table->text('ppt');
            $table->text('transkip');
            $table->text('peec');
            $table->text('skpi');
            $table->text('spp');
            $table->text('sks');
            $table->text('status');
            $table->text('judul_skripsi_id')->nullable();
            $table->text('user_id')->nullable();
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
        Schema::dropIfExists('seminars');
    }
};
