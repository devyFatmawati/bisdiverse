<?php

namespace Modules\Judulskripsi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryPengajuanJudul extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_npm', 'npm');
    }

    protected static function newFactory()
    {
        return \Modules\Judulskripsi\Database\factories\HistoryPengajuanJudulFactory::new();
    }
}
