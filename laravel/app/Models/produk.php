<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'buah_gambar',
        'buah_nama',
        'harga',
        'negara_id',
        'benua_id',
        'keterangan',
        'stock'
    ];

    public function negara()
    {
        return $this->belongsTo(Negara::class, 'negara_id');
    }

    public function benua()
    {
        return $this->belongsTo(Benua::class, 'benua_id');
    }
}
