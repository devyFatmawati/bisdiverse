<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function jadwal_ujian()
    {
        return $this->hasMany(JadwalUjian::class,'dosen_kds','kds');
    }
    public function matkul()
    {
        return $this->hasMany(Matkul::class,'dosen_kds','kds');
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\DosenFactory::new();
    }
}
