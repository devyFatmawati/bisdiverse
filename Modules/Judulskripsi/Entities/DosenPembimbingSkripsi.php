<?php

namespace Modules\Judulskripsi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\Dosen;

class DosenPembimbingSkripsi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_kds', 'kds');
    }
    
    protected static function newFactory()
    {
        return \Modules\Judulskripsi\Database\factories\DosenPembimbingSkripsiFactory::new();
    }
}
