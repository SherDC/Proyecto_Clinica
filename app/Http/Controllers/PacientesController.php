<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = DB::table('pacientes')->get();
        return view('pacientes.index',['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	$escuelas = DB::table('escuelas_profesionales')->get();
      return view('pacientes.create',['escuelas'=>$escuelas]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dni = $request->input('dni');
        $password = $request->input('Password');
        $codigo = $request->input('Codigo');
        $nombres = $request->input('Nombres');
        $apellidos = $request->input('Apellidos');
        $fecha_nacimiento = $request->input('Fecha_Nacimiento');
        $sexo = $request->input('Sexo');
        $telefono = $request->input('Telefono');
        $e_mail = $request->input('E_mail');
        $direccion = $request->input('Direccion');
        $tipo_paciente= $request->input('Tipo_Paciente');
        $escuela = $request->input('Escuela');


        if($request->input('Estado')=='Habilitado'){
          $estado = 1;
        }
        else {
          $estado = 0;
        }

        $escuela_id='';

        $escuelas = DB::table('escuelas_profesionales')->get();
        foreach($escuelas as $esc)
        {
        	if($escuela==$esc->nombre){
        		  $escuela_id = $esc->id;
        	}
        }

        DB::table('pacientes')->insert([
          'dni'=> $dni,
          'contraseña'=>$password,
          'codigo'=>$codigo,
          'nombres'=>$nombres,
          'apellidos'=>$apellidos,
          'fecha_nacimiento'=>$fecha_nacimiento,
          'sexo'=>$sexo,
          'telefono'=>$telefono,
          'correo'=>$e_mail,
          'direccion'=>$direccion,
          'tipo_paciente'=>$tipo_paciente,
          'escuelas_profesionales_id'=>$escuela_id,
          'estado'=>$estado
        ]);

        return $this->index();

        return redirect('pacientes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return $this->index();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $paciente = DB::table('pacientes')->where('dni',$id)->first();

        $escuelas = DB::table('escuelas_profesionales')->get();
        return view('pacientes.edit',['paciente'=>$paciente,'escuelas'=>$escuelas]);
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
      $dni = $request->input('dni');
      $password = $request->input('Password');
      $codigo = $request->input('Codigo');
      $nombres = $request->input('Nombres');
      $apellidos = $request->input('Apellidos');
      $fecha_nacimiento = $request->input('Fecha_Nacimiento');
      $sexo = $request->input('Sexo');
      $telefono = $request->input('Telefono');
      $e_mail = $request->input('E_mail');
      $direccion = $request->input('Direccion');
      $tipo_paciente->input('Tipo_Paciente');
      $escuela->input('Escuela');


      if($request->input('Estado')=='Habilitado'){
        $estado = 1;
      }
      else {
        $estado = 0;
      }


      $escuelas = DB::table('escuelas')->get();
      foreach($escuelas as $esc)
      {
        if($escuela==$esc->nombre){
            $escuela_id = $esc->id;
        }
      }

      DB::table('pacientes')->where('dni',$id)
        ->update([
          'dni'=> $dni,
          'contraseña'=>$password,
          'codigo'=>$codigo,
          'nombres'=>$nombres,
          'apellidos'=>$apellidos,
          'fecha_nacimiento'=>$fecha_nacimiento,
          'sexo'=>$sexo,
          'telefono'=>$telefono,
          'correo'=>$e_mail,
          'direccion'=>$direccion,
          'tipo_paciente'=>$tipo_paciente,
          'escuelas_profesionales_id'=>$escuela_id,
          'estado'=>$estado
      ]);
      return redirect('pacientes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          DB::table('pacientes')->where('dni',$id)->delete();
        //
      return redirect('pacientes');

    }
}
