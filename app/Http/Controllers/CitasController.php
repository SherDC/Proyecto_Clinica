<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $item1='id';
     public $item2='fecha';
     public $item3='hora';
     public $item4='estado';
     public $item5='medicos_dni';
     public $item6='pacientes_dni';

     public $tabla='citas';
     public $tabla1='medicos';
     public $tabla2='pacientes';

    public function index()
    {
        $t1 = DB::table($this->tabla)->get();
        return view($this->tabla.'.index',[$this->tabla => $t1]);
    }

    /**
   * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          $t = DB::table($this->tabla)->get();
          $t1 = DB::table($this->tabla1)->get();
          $t2 = DB::table($this->tabla2)->get();
        return view($this->tabla.'.create',[$this->tabla1=>$t1,$this->tabla2=>$t2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $a = $request->input($this->item1);
        $b = $request->input($this->item2);
        $c = $request->input($this->item3);
        $d = ($request->input($this->item4)=='Habilitado')?1:0;
        $e = $request->input($this->item5);
        $f = $request->input($this->item6);

        DB::table($this->tabla)->insert([
          $this->item1=>$a,
          $this->item2=>$b,
          $this->item3=>$c,
          $this->item4=>$d,
          $this->item5=>$e,
          $this->item6=>$f
        ]);
        return redirect($this->tabla);
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
      $t = DB::table($this->tabla)->where($this->item1,$id)->first();
      $t1 = DB::table($this->tabla1)->get();
      $t2 = DB::table($this->tabla2)->get();
    return view($this->tabla.'.edit',[
      $this->tabla=>$t,
      $this->tabla1=>$t1,
      $this->tabla2=>$t2
    ]);
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
      $a = $request->input($this->item1);
      $b = $request->input($this->item2);
      $c = $request->input($this->item3);
      $d = ($request->input($this->item4)=='Habilitado')?1:0;
      $e = $request->input($this->item5);
      $f = $request->input($this->item6);

      DB::table($this->tabla)->where($this->item1,$id)->update([
        $this->item2=>$b,
        $this->item3=>$c,
        $this->item4=>$d,
        $this->item5=>$e,
        $this->item6=>$f
      ]);
      return redirect('citas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      DB::table($this->tabla)->where($this->item1,$id)->delete();
      return redirect('citas');
    }
}
