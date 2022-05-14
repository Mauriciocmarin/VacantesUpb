<?php

namespace App\Http\Controllers;

use App\Models\EstudianteModal;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante = EstudianteModal::all();

        $data["data"] = $estudiante;

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // cuando llega informacion
        //se ejecuta cuando utilizon el metodo post de posman 

        $input = $request->all();
        //$empresa = new EmpresaModal();
        //$empresa -> razon_social = $request -> razon_social;

        // creamos y guardamos un nuevo dato 
        $respuesta = EstudianteModal::create($input);

        return $respuesta;
        //return $input;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = EstudianteModal::find($id);
        return $estudiante;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $codigo = 200;
        $estudiante = EstudianteModal::find($id);
        if ($estudiante) {
            $input = $request->all();
            EstudianteModal::where('id', $id)
                ->update($input);
            $data["mensaje"] = "Actualizado correctamente";
        } else {
            $codigo = 401;
            $data["error"] = "No se logro Actualizar";
        }

        return response()->json($data, $codigo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $codigo = 200;
        $estudiante = EstudianteModal::find($id);
        if ($estudiante) {
            if (EstudianteModal::destroy($id)) {

                $data["mensaje"] = "Eliminado correctamente";
            } else {
                $codigo = 401;
                $data["error"] = "No se logro eliminar";
            }
        } else {
            $codigo = 401;
            $data["error"] = "No existe el id {$id}";
        }
        return response()->json($data, $codigo);
    }
    
}
