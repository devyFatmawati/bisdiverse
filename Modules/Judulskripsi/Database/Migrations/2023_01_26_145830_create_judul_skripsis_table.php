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
        Schema::create('judul_skripsis', function (Blueprint $table) {
            $table->id();
            $table->text('mahasiswa_npm');
            $table->text('konsentrasi');
            $table->text('judul_penelitian');
            $table->text('kds_dosen');
            $table->text('anggota_dosen');
            $table->text('user_id')->nullable();
            $table->text('status');
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
        Schema::dropIfExists('judul_skripsis');
    }
};
