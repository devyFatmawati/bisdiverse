<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rfid extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\RfidFactory::new();
    }
}
