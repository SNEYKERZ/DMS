<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    public function documentos()
    {
        return $this->hasMany(Documentos::class);
    }
}
