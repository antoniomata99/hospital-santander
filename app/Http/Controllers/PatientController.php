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

        if($tipo_documento == "Seleccione una opción" || empty($tipo_documento)){
            return redirect('patient')->with('error_patient', 'No ha llenado ningún campo');
        }

        if($tipo_documento == "Seleccione una opción" || empty($tipo_documento)){
            return redirect('patient')->with('error_patient', 'No ha seleccionado un tipo de documento');
        }

        if(empty($numero_documento)){
            return redirect('patient')->with('error_patient', 'No ha digitado un documento de identidad');
        }

        $id_user_collections = Usuario::select('id_usuario')->where('tipo_documento', $tipo_documento)->where('numero_documento', $numero_documento)->get();

        //Inicio validación del documento con la tabla Usuario
        $empty_user_collections = $id_user_collections->isEmpty();
        if($empty_user_collections == true){
            return redirect('patient')->with('error_patient', 'Lo sentimos, no existe este documento');
        }else{
            foreach ($id_user_collections as $id_user_collection){
                 $id_numero_documento = $id_user_collection->id_usuario;
            }
        }
        //Fin validación del documento con la tabla Usuario

        //Inicio validación orden remisión
        $id_user_remision_collections = Remision::where('id_usuario_paciente', $id_numero_documento)->get();
        $empty_user_remision = $id_user_remision_collections->isEmpty();
        if($empty_user_remision == true){
            return redirect('patient')->with('error_patient', 'Lo sentimos, no tiene orden de remision');
        } else{
            return redirect('/patient/'.$id_numero_documento);
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
        $id_usuario = $id;
        $especialidades = DB::select(
            DB::raw("
            SELECT especialidad.nombre
            FROM remision, especialidad
            WHERE remision.id_usuario_paciente = '$id' AND remision.id_especialidad = especialidad.id_especialidad;
            ")
        );

        /*
        foreach ($results as $result){
            $xd = $result->nombre;
        }*/


        return view('appointment', compact('especialidades', 'id_usuario'));


        //return view('appointment');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    public function requestData(Request $request){

        $especialidadNombre = null;

        if (isset($request->especialidadNombre)) {
            $especialidadNombre = $request->especialidadNombre;
        }

        $medicos = DB::select(
            DB::raw("
            SELECT usuario.nombre_usuario
            FROM usuario, medico, especialidad
            WHERE especialidad.nombre = '$especialidadNombre' AND
            especialidad.id_especialidad = medico.id_especialidad AND
            medico.id_usuario = usuario.id_usuario;
            ")
        );

        return response()->json($medicos);
        //return response(json_enconde($medicos))->header('Content-type', 'text/plain');
    }
}
