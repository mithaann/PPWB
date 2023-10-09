<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class negara extends Model
{
    use HasFactory;
    protected $fillable = [
        'negara_name',
        'negara_image',
        'benua_id'
    ];

    public function benua()
    {
        return $this->belongsTo(Benua::class, 'benua_id');
    }
}
