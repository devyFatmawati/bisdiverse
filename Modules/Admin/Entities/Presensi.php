<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function matkul()
    {
        return $this->belongsTo(Matkul::class,'matkul_kode','kode');
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\PresensiFactory::new();
    }
}
