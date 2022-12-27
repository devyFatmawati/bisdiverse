<?php

namespace Modules\Magang\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\Dosen;
use Modules\Admin\Entities\Mahasiswa;

class Magang extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_npm', 'npm');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_kds', 'kds');
    }

    protected static function newFactory()
    {
        return \Modules\Magang\Database\factories\MagangFactory::new();
    }
}
