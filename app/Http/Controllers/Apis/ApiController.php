<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instrument;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function index(){
        $instrumentos = Instrument::all();

        if($instrumentos->count() > 0){
            return response()->json([
                "status" => 200,
                "instrumentos" => $instrumentos
            ], 200);
        } else {
            return response()->json([
                "status" => 404,
                "instrumentos" => "Not found"
            ], 404);
        }
    }

    public function show($id){
        $instrumento = Instrument::find($id);

        if($instrumento){
            return response()->json([
                "status" => 200,
                "instrumento" => $instrumento
            ], 200);
        } else {
            return response()->json([
                "status" => 404,
                "mensaje" => "Instrumento no encontrado"
            ], 404);
        }
    }
}
