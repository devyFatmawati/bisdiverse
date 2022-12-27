<?php

namespace Modules\Magang\Entities;

use Modules\Admin\Entities\Dosen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DosenPembimbingMagang extends Model
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
        return \Modules\Magang\Database\factories\DosenPembimbingMagangFactory::new();
    }
}
