<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    protected $table = 'elecciones';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nombreEle',
        'fechaInicio',
        'fechaFin',
        'estado',
        'descripcion',
    ];

    /**
     * Get the users that participate in the election.
     */
    public function participantes()
    {
        return $this->hasMany(User::class, 'eleccion_id');
    }

    /**
     * Get the candidates that belong to the election.
     */
    public function candidatos()
    {
        return $this->belongsToMany(Persona::class, 'eleccion_candidato')
            ->withPivot('nroCartelera'); // Agrega esto para obtener el nroCartelera
    }
    /**
     * Get the votes that belong to the election.
     */
    public function votos()
    {
        return $this->hasManyThrough(Voto::class, EleccionCandidato::class);
    }
}
