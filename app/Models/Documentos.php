<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'tipo_id',
        'area_id',
        'url',
        'estado',
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
