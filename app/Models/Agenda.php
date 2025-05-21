<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'nombre',
        'telefono',
        'fecha_nacimiento',
    ];
    

    protected $casts = [
        'fecha_nacimiento' => 'date', // o 'datetime' si tiene tiempo
    ];
}
