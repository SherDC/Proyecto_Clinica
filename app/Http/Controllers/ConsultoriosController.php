<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class ConsultoriosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $consultorios = DB::table('consultorios')->get();
    $especialidad = DB::table('especialidades')->get();
      return view('consultorios.indexConsultorios',['consultorios' => $consultorios]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $especialidades = DB::table('especialidades')->get();
    return view('consultorios.AgregarConsultorio',['especialidades'=>$especialidades ] );
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

      $dni = $request->input('id');
      $password = $request->input('ubicacion');
      $codigo = $request->input('especialidades_codigo');

      DB::table('consultorios')->insert([
        'id'=> $dni,
        'ubicacion'=>$password,
        'especialidades_codigo'=>$codigo,

      ]);
      return redirect('consultorios');
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
    $consultorios = DB::table('consultorios')->where('id',$id)->first();
    $especialidades = DB::table('especialidades')->get();

      return view('consultorios.edit',['consultorios'=>$consultorios,'especialidades'=>$especialidades]);
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
    $password = $request->input('ubicacion');
    $codigo = $request->input('especialidades_codigo');

    DB::table('consultorios')->where('id',$id)
      ->update([
      'ubicacion'=>$password,
      'especialidades_codigo'=>$codigo,
    ]);
    return redirect('consultorios');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

        DB::table('consultorios')->where('id',$id)->delete();

      //
    return redirect('consultorios');

  }
}
