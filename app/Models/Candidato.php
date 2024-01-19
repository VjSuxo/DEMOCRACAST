<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'persona_id',
        'nroCartelera',
        // Otros campos relacionados con Candidato
    ];

    /**
     * Get the persona record associated with the candidato.
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

     /**
     * Get the elections that the candidate belongs to.
     */
    public function elecciones()
    {
        return $this->belongsToMany(Eleccion::class, 'eleccion_candidato');
    }
}
