@extends('layouts.master')

@section('title')
Referidos
@endsection

@section('content')
<div class="row">
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <h2 style="margin: 0px !important;"> Referidos </h2>
        <h5 style="margin: 0px !important;"> Puntos: </h5>
        <h3 class="teal-text text-lighten-2" style="margin: 0px !important;"> {{Auth::user()->puntos}} </h3>
        <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 5px auto;"></div>
    </div>
    <div class="col s12 center-align">
        <div  class="input-field col s5 offset-s3">
        <i class="mdi-action-account-circle prefix"></i>
        <input id="referir" type="text" value="{{route('refer.referir', Auth::user())}}" class="validate">
        <label for="referir">Enlace para Referidos</label>
        </div>
        <div  class="input-field col s3">
        <button class="waves-effect waves-light btn-large tooltipped" style="float: left;" data-position="top" data-delay="50" data-tooltip="Copiar" onclick="setClipboardCard()"><i class="mdi-content-content-copy"></i></button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 grey lighten-2" style="border-radius: 5px; padding: 10px;">
        <table class="responsive-table hoverable">
            <thead>
              <tr>
                  <th data-field="id">Nombre</th>
                  <th data-field="name">Correo</th>
                  <th data-field="price">Fecha de Cuenta</th>
              </tr>
            </thead>
    
            <tbody>
                @foreach ($refers as $refer)
                    <tr>
                        <td>{{$refer->name}}</td>
                        <td>{{$refer->email}}</td>
                        <td>{{$refer->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
               
            </tfoot>
          </table>
    </div>
</div>

@endsection
