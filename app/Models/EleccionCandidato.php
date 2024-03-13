<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EleccionCandidato extends Model
{
    use HasFactory;

    protected $table = 'eleccion_candidato';

    protected $fillable = [
        'eleccion_id',
        'persona_id',
        'nroCartelera',
        'cantVotos',
    ];

    // Relación con la tabla 'elecciones'
    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class, 'eleccion_id');
    }

    // Relación con la tabla 'personas'
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }

}
