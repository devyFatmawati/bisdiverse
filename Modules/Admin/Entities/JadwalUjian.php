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
        return $this->belongsTo(Dosen::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkul_id', 'id');
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
