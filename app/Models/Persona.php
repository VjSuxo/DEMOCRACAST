<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apePaterno',
        'apeMaterno',
    ];

    /**
     * Get the user record associated with the persona.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
}
