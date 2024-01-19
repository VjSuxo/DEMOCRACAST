<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        return $this->belongsToMany(Candidato::class, 'eleccion_candidato');
    }

    /**
     * Get the votes that belong to the election.
     */
    public function votos()
    {
        return $this->hasMany(Voto::class, 'eleccion_id');
    }
}
