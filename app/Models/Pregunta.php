<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $table = 'tbl_preguntas';
    protected $primaryKey = 'cvePregunta';
    protected $fillable = [
        'cvePregunta',
        'desPregunta',
        'activo',
        'fechaRegistro',
        'fechaActualizacion',
    ];
}
