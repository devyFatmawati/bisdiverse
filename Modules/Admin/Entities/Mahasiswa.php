<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_kode', 'kode');
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\MahasiswaFactory::new();
    }
}
