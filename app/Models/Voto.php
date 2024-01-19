<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'eleccion_id',
        'opcion',
        'hora',
        // Otros campos relacionados con Voto
    ];

    /**
     * Get the user that owns the vote.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the election that the vote belongs to.
     */
    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class);
    }
}
