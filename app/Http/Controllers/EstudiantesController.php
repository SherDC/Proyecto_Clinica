<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class EstudiantesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $estudiantes = DB::table('estudiantes')->get();
    return view('estudiantes.index',['estudiantes'=>$estudiantes]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('estudiantes.Agregar');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $a = $request->input('dni');
      $b = $request->input('contraseña');
      $c = $request->input('codigo');
      $d = $request->input('telefono');
      $e = $request->input('correo');
      $f = $request->input('direccion');
      $g = $request->input('habilitado');
      $h = $request->input('escuelas_profesionales_id');
      $i = $request->input('historiales_medicos_id');

      DB::table('estudiantes')->insert([
        'dni'=> $a,
        'contraseña'=>$b,
        'codigo'=>$c,
        'telefono'=>$d,
        'correo'=>$e,
        'direccion'=>$f,
        'habilitado'=>$g,
        'escuelas_profesionales_id'=>$h,
        'historiales_medicos_id'=>$i
      ]);
      return redirect('estudiantes');
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
    $estudiantes = DB::table('estudiantes')->where('dni',$id)->first();
    return view('estudiantes.edit',['estudiantes'=>$estudiantes]);
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
    $a = $request->input('dni');
    $b = $request->input('contraseña');
    $c = $request->input('codigo');
    $d = $request->input('telefono');
    $e = $request->input('correo');
    $f = $request->input('direccion');
    $g = $request->input('habilitado');
    $h = $request->input('escuelas_profesionales_id');
    $i = $request->input('historiales_medicos_id');

    DB::table('estudiantes')->where('dni', $id)
    ->uppdate([
      'contraseña'=>$b,
      'codigo'=>$c,
      'telefono'=>$d,
      'correo'=>$e,
      'direccion'=>$f,
      'habilitado'=>$g,
      'escuelas_profesionales_id'=>$h,
      'historiales_medicos_id'=>$i
    ]);
    return redirect('estudiantes');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    DB::table('estudiantes')->where('dni',$id)->delete();
    return redirect('estudiantes');
  }
}
