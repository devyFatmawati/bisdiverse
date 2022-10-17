<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruangan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public function jadwal_ujian()
    {
        return $this->hasMany(JadwalUjian::class);
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\RuanganFactory::new();
    }
}
