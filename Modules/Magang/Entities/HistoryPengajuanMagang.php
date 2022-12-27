<?php

namespace Modules\Magang\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryPengajuanMagang extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected static function newFactory()
    {
        return \Modules\Magang\Database\factories\HistoryPengajuanMagangFactory::new();
    }
}
