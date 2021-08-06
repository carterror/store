@extends('layouts.master')

@section('title')
    Información
@endsection

@section('content')
    <div class="row" style="padding: 20px">
        
        <div class="col s12 m4" style="margin-top: 15px; padding: 15px;">
          <form action="{{route('pass.edit')}}" method="POST">
          @csrf
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); margin: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Contraseña</h5>
                </div>
            </div>
            <div class="row" style="padding: 10px;">
              <div class="input-field col s12">
                  <input id="passa" name="passa" type="password" class="validate">
                  <label for="passa">Contraseña Actual</label>
              </div>
              <div class="input-field col s12">
                <input id="pass" name="pass" type="password" class="validate">
                <label for="pass">Nueva Contraseña</label>
            </div>
            <div class="input-field col s12">
              <input id="passc" name="passc" type="password" class="validate">
              <label for="passc">Confirmar Contraseña</label>
            </div>
          </div>
          <div class="row align-right" style="padding-left: 10px;">
            <div class="col s6">
              <button class="waves-effect waves-light btn" type="submit">Guardar</button>
            </div>
          </div>
          </div>
          </form>
        </div>

        <div class="col s12 m8" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); margin: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Información</h5>
                </div>
            </div>
            <form action="{{route('info.edit')}}" method="POST">
              @csrf
            <div class="row" style="padding: 10px;">
                  <div class="input-field col s6">
                      <input id="nombre" name="nombre" type="text" value="{{Auth::user()->name}}" class="validate">
                      <label for="nombre">Nombre</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="lastname" name="lastname" type="text" value="{{Auth::user()->last_name}}" class="validate">
                    <label for="lastname">Apellidos</label>
                </div>
                <div class="input-field col s6">
                  <input id="phone" name="phone" type="text" value="{{Auth::user()->phone}}" class="validate">
                  <label for="phone">Teléfono</label>
                </div>
                <div class="input-field col s6">
                  <input id="email" name="email" type="text" value="{{Auth::user()->email}}" class="validate" disabled>
                  <label for="email">Correo</label>
                </div>
                
          </div>
          <div class="row align-right" style="padding-left: 10px;">
            <div class="col s6">
              <button class="waves-effect waves-light btn" type="submit">Guardar</button>
            </div>
          </div>
          </form>
        </div>

      </div>
    </div>
@endsection
