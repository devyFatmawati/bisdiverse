<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalUjian extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_kds','kds');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkul_kode', 'kode');
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\JadwalUjianFactory::new();
    }
}
