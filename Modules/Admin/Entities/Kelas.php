<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function jadwal_ujian()
    {
        return $this->hasMany(JadwalUjian::class,'matkul_kode','kode');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\KelasFactory::new();
    }
}
