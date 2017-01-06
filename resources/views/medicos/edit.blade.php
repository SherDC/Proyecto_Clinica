@extends('medicos.mantenimiento_medicos')

@section('Titulo')
<i class="fa fa-gear fa-fw"></i>
<a1>Mantenimiento de Médicos<a1>
@endsection
@section('Contenido')
        <form method="POST" action="/medicos/{{ $medico->dni }}" autocomplete="off">
          {{csrf_field()}}
          {{method_field('PUT')}}

            <fieldset>

            <div class="text-center"><h2 align="center">Modificar Médico</h2>
            </div></br>


            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <input id="dni" name="dni" placeholder="DNI" class="form-control" value="{{$medico->dni}}" required>
                  </div>
            </div></br></br>
            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-lock bigicon"></i></span>
                  <div class="col-md-6 col-xs-10">
                      <input id="Password" type="Password" name="Password" placeholder="Password" class="form-control" value="{{$medico->contraseña}}" required>
                  </div>
            </div></br></br>

            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <input id="Codigo" name="Codigo" placeholder="Código" class="form-control" value="{{$medico->codigo}}" required>
                  </div>
            </div></br></br>

            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <input id="Nombres" name="Nombres" placeholder="Nombres" class="form-control" value="{{$medico->nombres}}" required>
                  </div>
            </div></br></br>
            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <input id="Apellidos" name="Apellidos" placeholder="Apellidos" class="form-control" value="{{$medico->apellidos}}" required>
                  </div>
            </div></br></br>
            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <input id="Fecha_Nacimiento" name="Fecha_Nacimiento" placeholder="Fecha de Nacimiento" class="form-control" value="{{$medico->fecha_nacimiento}}" required>
                  </div>
            </div></br></br>

           <div class="form-group">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>

                <div class="col-md-6 col-xs-10">
                    <input id="Sexo" name="Sexo" placeholder="E-Mail" class="form-control" value="{{$medico->sexo}}" required>
                </div>
          </div></br></br>


          <div class="form-group">
                <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-phone bigicon"></i></span>

                <div class="col-md-6 col-xs-10">
                    <input id="Telefono" name="Telefono" placeholder="Teléfono" class="form-control" value="{{$medico->telefono}}" required>
                </div>
          </div></br></br>

             <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <input id="E_mail" name="E_mail" placeholder="E-Mail" class="form-control" value="{{$medico->correo}}" required>
                  </div>
            </div></br></br>


            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <input id="Direccion" name="Direccion" placeholder="Dirección" class="form-control" value="{{$medico->direccion}}" required>
                  </div>
            </div></br></br>

            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <select id="Estado" name="Estado" placeholder="Estado" class="form-control">
                        @if($medico->habilitado=="1")
                          <option selected>Habilitado</option>
                          <option>Deshabilitado</option>
                        @else
                          <option >Habilitado</option>
                          <option selected>Deshabilitado</option>
                        @endif
                      </select>

                  </div>
            </div></br></br>

            <div class="form-group">
                  <span class="col-md-1 col-xs-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon"></i></span>

                  <div class="col-md-6 col-xs-10">
                      <select id="Especialidad" name="Especialidad" placeholder="Especialidad" class="form-control">
                        @foreach($especialidades as $especialidad)
                            @if($especialidad->codigo==$medico->especialidades_codigo)
                                <option selected>{{$especialidad->nombre}}</option>

                            @else
                                <option>{{$especialidad->nombre}}</option>
                            @endif
                        @endforeach
                      </select>

                  </div>
            </div></br></br>



            <div class="form-group">
                  <div class="col-md-12 text-center">
                      <input type="submit" style="width:80px" class="btn btn-success" align="center" class="form-control" value="Guardar">
                      <button type="reset" style="width:80px" class="btn btn-primary" align="center" class="form-control" >Limpiar</button>

                  </div>
            </div></br></br>

            </fieldset>


       </form>
@endsection
