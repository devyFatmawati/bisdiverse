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
        Schema::create('magangs', function (Blueprint $table) {
            $table->id();
            $table->text('dosen_kds');
            $table->text('mahasiswa_npm');
            $table->text('instansi');
            $table->text('alamat_instansi');
            $table->text('posisi');
            $table->text('departemen');
            $table->text('no_telp');
            $table->text('surat_permohonan');
            $table->text('status');
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
        Schema::dropIfExists('magangs');
    }
};
