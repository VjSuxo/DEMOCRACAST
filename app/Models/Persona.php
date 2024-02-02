<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nombre',
        'apePaterno',
        'apeMaterno',
        'foto',
    ];

    /**
     * Get the user record associated with the persona.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Get the elections that the candidate belongs to.
     */
    public function elecciones()
    {
        return $this->belongsToMany(Eleccion::class, 'eleccion_candidato')
            ->withPivot('nroCartelera'); // Agrega esto para obtener el nroCartelera
    }
}
