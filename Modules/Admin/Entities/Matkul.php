<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matkul extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public function jadwal_ujian()
    {
        return $this->hasMany(Jadwal_ujian::class);
    }
    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'dosen_kds','kds');
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\MatkulFactory::new();
    }
}
