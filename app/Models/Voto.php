<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'eleccion_id',
        'eleccion_candidato_id',
        'nroVotos',
        'tipoVoto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class);
    }

    public function candidato()
    {
        return $this->belongsTo(EleccionCandidato::class, 'eleccion_candidato_id');
    }
}
