<?php

namespace Modules\Judulskripsi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\Dosen;
use Modules\Admin\Entities\Mahasiswa;

class JudulSkripsi extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_npm', 'npm');
    }

    public function ketuadosen()
    {
        return $this->belongsTo(Dosen::class, 'kds_dosen', 'kds');
    }
    public function anggotaadosen()
    {
        return $this->belongsTo(Dosen::class, 'anggota_dosen', 'kds');
    }
    protected static function newFactory()
    {
        return \Modules\Judulskripsi\Database\factories\JudulSkripsiFactory::new();
    }
}
