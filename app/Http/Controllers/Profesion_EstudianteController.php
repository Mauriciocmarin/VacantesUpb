<?php

namespace App\Http\Controllers;

use App\Models\Profesion_EstudianteModal;
use Illuminate\Http\Request;

class Profesion_EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = Profesion_EstudianteModal::where("ID_estudiante", $request->ID_estudiante)->get();

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
        $respuesta = Profesion_EstudianteModal::create($input);

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
        $estudiante = Profesion_EstudianteModal::find($id);
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
        $idEstudiante = $id;
        $id_Profesion = $request->id_Profesion;
        $codigo = 200;
        //$estudiante = Profesion_EstudianteModal::find($idEstudiante);
        $data = Profesion_EstudianteModal::where("ID_estudiante", $request->ID_estudiante)->where("ID_profesion", $request->ID_profesion)->get();
        if ($data) {
            $input = $request->all();
            Profesion_EstudianteModal::where("ID_estudiante", $request->ID_estudiante)->where("ID_profesion", $request->ID_profesion)
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
        $estudiante = Profesion_EstudianteModal::find($id);
        if ($estudiante) {
            if (Profesion_EstudianteModal::destroy($id)) {

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
