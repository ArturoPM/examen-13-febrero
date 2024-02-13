<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Pregunta;
use App\Models\Respuesta;

class ExamenController extends Controller
{
    public function examen()
    {
        $numero_de_preguntas = 4;
        $preguntas_activas = Pregunta::select('cvePregunta')->where('activo', 1)->get();

        $preguntas_seleccionadas = Arr::random($preguntas_activas->toArray(), $numero_de_preguntas);

        $preguntas_finales = Pregunta::whereIn('cvePregunta', $preguntas_seleccionadas)
        ->get()
        ->shuffle();

        $preguntasyrespuestas = [];

        foreach($preguntas_finales as $pregunta){

            $respuesta_correcta = Respuesta::where('cvePregunta', $pregunta->cvePregunta)
            ->where('correcta', 1)
            ->first();

            $respuestas_incorrectas = Respuesta::where('cvePregunta', $pregunta->cvePregunta)
            ->where('correcta', 0)
            ->get()
            ->shuffle();

            $respuestas = [];
            array_push($respuestas, $respuesta_correcta);
            
            for ($i=0; $i < 3; $i++) { 
                array_push($respuestas, $respuestas_incorrectas[$i]);
            }
            
            array_push($preguntasyrespuestas, array(
                'pregunta' => $pregunta,
                'respuestas' => collect($respuestas)->shuffle(),
            ));
        }

        return Response()->json($preguntasyrespuestas, 200);
    }
}
