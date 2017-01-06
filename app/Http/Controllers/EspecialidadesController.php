<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class EspecialidadesController extends Controller
{

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
        $especialidades = DB::table('especialidades')->get();
          return view('Especialidades.indexEspecialidades',['especialidades'=>$especialidades]);
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('Especialidades.AgregarEspecialidadeS');
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
        $a = $request->input('codigo');
        $b = $request->input('nombre');
        $c = $request->input('habilitado');

          DB::table('especialidades')->insert([
            'codigo'=> $a,
            'nombre'=>$b,
            'habilitado'=>$c
          ]);

          return redirect('especialidades');
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
        $especialidades = DB::table('especialidades')->where('codigo',$id)->first();
        return view('Especialidades.edit',['especialidades'=>$especialidades]);
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

        $a = $request->input('nombre');
        $b = $request->input('habilitado');
        DB::table('especialidades')->where('codigo',$id)
            ->update([
              'nombre'=>$a,
              'habilitado'=>$b,
        ]);
           return redirect('especialidades');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        DB::table('especialidades')->where('codigo',$id)->delete();
        return redirect('especialidades');
      }
}
