<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = DB::table('medicos')->get();
        return view('medicos.index',['medicos' => $medicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	  $especialidades = DB::table('especialidades')->get();
        return view('medicos.create',['especialidades'=>$especialidades]);

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
        $estado = $request->input('Estado');
        $especialidad = $request->input('Especialidad');

        //Calcular el valor de habilitado/desabilitado
        if($request->input('Estado')=='Habilitado'){
          $estado = 1;
        }
        else {
          $estado = 0;
        }



        $especialidades = DB::table('especialidades')->get();
        foreach($especialidades as $esp)
        {
        	if($especialidad==$esp->nombre){
        		  $Cod_Especialidad = $esp->codigo;
        	}
        }

        DB::table('medicos')->insert([
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
          'habilitado'=>$estado,
          'especialidades_codigo'=>$Cod_Especialidad
        ]);

        return $this->index();

        return redirect('medicos');

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
        $medico = DB::table('medicos')->where('dni',$id)->first();

        $especialidades = DB::table('especialidades')->get();
        return view('medicos.edit',['medico'=>$medico,'especialidades'=>$especialidades]);
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
      $estado = $request->input('Estado');
      $especialidad = $request->input('Especialidad');

      if($request->input('Estado')=='Habilitado'){
        $estado = 1;
      }
      else {
        $estado = 0;
      }



      $especialidades = DB::table('especialidades')->get();
      foreach($especialidades as $esp)
      {
        if($especialidad==$esp->nombre){
            $Cod_Especialidad = $esp->codigo;
        }
      }


      DB::table('medicos')->where('dni',$id)
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
        'habilitado'=>$estado,
        'especialidades_codigo'=>$Cod_Especialidad
      ]);
      return redirect('medicos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          DB::table('medicos')->where('dni',$id)->delete();

        //
      return redirect('medicos');

    }
}
