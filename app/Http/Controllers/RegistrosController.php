<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistroCollection;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    public function index () {
        $registros = Registro::where('estado', '0')->get();

        

        if($registros->count() > 0) {
            Registro::where('estado', '0')->update(['estado' => '1']);
        
            return response()->json($registros);
        }

        return response()->json([]);
    }

    // Crea una nueva petición de encendido (aplicación)
    public function crear (Request $request) {
        $numPendientes = Registro::where('estado', '0')->count();

        if($numPendientes > 0) {
            return [
                'message' => 'No ha sido posible encender la PC, existe una petición de encendido pendiente de atender'
            ];
        }

        // Guardando petición en BD
        $timestamp = date('Y-m-d H:i:s');
        $estado = 0;
        $completado = 0;

        $registro = new Registro();
        $registro->horaPeticion = $timestamp;
        $registro->estado = $estado;
        $registro->completadoConExito = $completado;
        $registro->save();
        
        return [
            'message' => 'Petición de encendido enviada exitosamente'
        ];

    }
}
