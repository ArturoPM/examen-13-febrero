<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    protected $table = 'tbl_respuestas';
    protected $primaryKey = 'cveRespuesta';
    protected $fillable = [
        'cveRespuesta',
        'cvePregunta',
        'desRespuesta',
        'correcta',
        'activo',
        'fechaRegistro',
        'fechaActualizacion',
    ];
}
