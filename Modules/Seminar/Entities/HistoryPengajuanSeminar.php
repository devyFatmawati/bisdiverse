<?php

namespace Modules\Seminar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryPengajuanSeminar extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Seminar\Database\factories\HistoryPengajuanSeminarFactory::new();
    }
}

