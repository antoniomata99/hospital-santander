<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Models\Remision;

class PatientController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('patient');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $tipo_documento = $request->get('tipo_documento');
        $numero_documento = $request->get('numero_documento');

        $id_user_collections = Usuario::select('id_usuario')->where('tipo_documento', $tipo_documento)->where('numero_documento', $numero_documento)->get();

        //Inicio validación del documento con la tabla Usuario
        $empty_user_collections = $id_user_collections->isEmpty();
        if($empty_user_collections == true){
            return redirect('patient')->with('id_document_not_found', 'Lo sentimos, no existe este documento');
        }else{
            foreach ($id_user_collections as $id_user_collection){
                 $id_numero_documento = $id_user_collection->id_usuario;

            }
        }
        //Fin validación del documento con la tabla Usuario

        //Inicio validación orden remisión
        $id_user_remision_collections = Remision::where('id_usuario', $id_numero_documento)->get();
        $empty_user_remision = $id_user_remision_collections->isEmpty();
        if($empty_user_remision == true){
            return redirect('patient')->with('remision_not_found', 'Lo sentimos, no tiene orden de remision');
        } else{
            foreach ($id_user_remision_collections as $id_user_remision_collection) {
                $id_usuario_orden_remision = $id_user_remision_collection->id_orden;
                return redirect('patient')->with('orden_remision', "Tiene una orden de remisión, esta es $id_usuario_orden_remision");
            }
        }
        //Fin validación orden remisión
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
