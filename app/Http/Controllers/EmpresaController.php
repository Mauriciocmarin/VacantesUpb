<?php

namespace App\Http\Controllers;

use App\Models\EmpresaModal;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // esta palabra paginado se pone en el posman ram {"paginado":true}
        if ($request->has("paginado")) {
            $empresa = EmpresaModal::paginate(1);
        } else {
            //como se llama el modelo 
            // estamos llamando todo la tabla de empresa
            $empresa = EmpresaModal::all();
        }
        $data["data"] = $empresa;

        // vamos a retornar la informacion en formato json 
        return response()->json($data, 200);
    }

    public function paginado(Request $request){

        return  EmpresaModal::paginate($request->registro);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   // cuando llega informacion
        //se ejecuta cuando utilizon el metodo post de posman 

        $input = $request->all();
        //$empresa = new EmpresaModal();
        //$empresa -> razon_social = $request -> razon_social;

        // creamos y guardamos un nuevo dato 
        $respuesta = EmpresaModal::create($input);

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
        $empresa = EmpresaModal::find($id);
        return $empresa;
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
        $empresa = EmpresaModal::find($id);
        if ($empresa) {
            $input = $request->all();
            EmpresaModal::where('id', $id)
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
        $empresa = EmpresaModal::find($id);
        if ($empresa) {
            if (EmpresaModal::destroy($id)) {

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
