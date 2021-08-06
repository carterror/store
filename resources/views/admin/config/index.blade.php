@extends('admin.master')

@section('title')
    Configuraciones
@endsection

@section('breadcrumb')
    <a href="{{ route('config') }}" class="breadcrumb"><span class="mdi-device-now-widgets small" > Ajustes </span></a>
@endsection

@section('content')
<div class="row" style="margin: 15px;, padding: 15px;">
  <div class="col s12 center-align z-depth-3 grey lighten-5" style="margin-top: 0px !important; padding: 0px !important; padding: 10px !important;">
      <h4 style="margin: 0px !important;"> Hash de Aplicación </h4>
      <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 5px auto;"></div>
      <div class="col s12 center-align">
        <div  class="input-field col s5 offset-s3">
        <i class="mdi-device-screen-lock-landscape prefix"></i>
        <input id="referir" type="text" value="{{$hash}}" class="validate">
        <label for="referir">Hash</label>
        </div>
        <div  class="input-field col s3">
        <button class="waves-effect waves-light btn-large tooltipped" style="float: left;" data-position="top" data-delay="50" data-tooltip="Copiar" onclick="setClipboardCard()"><i class="mdi-content-content-copy"></i></button>
        </div>
    </div>
  </div>

</div>

<form action="{{route('config.update')}}" method="POST">
  @csrf
    <div class="row" style="padding: 20px;">
        <div class="col s12 z-depth-3 grey lighten-5">
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-device-now-widgets small left"></i>Ajustes</h5>
                </div>

                <div class="col s5 right-align">
                    <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;">Guardar</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="name" name="name" type="text" value="{{$config->name}}" class="validate">
                        <label for="name">Nombre</label>
                    </div>
                    <div class="input-field col s6 m3">
                      <input id="product_pag" name="product_pag" value="{{$config->product_pag}}" type="number" class="validate">
                      <label for="product_pag">Productos por página</label>
                    </div>
                    <div class="input-field col s6 m3">
                      <input id="current" name="current" value="{{$config->current}}" type="text" class="validate">
                      <label for="current">Moneda</label>
                  </div>
                  </div>
                   <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="fb" name="fb" type="text" value="{{$config->fb}}" class="validate">
                        <label for="fb">Facebook</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="ig" name="ig" type="text" value="{{$config->ig}}" class="validate">
                      <label for="ig">Instagram</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="wa" name="wa" type="text" value="{{$config->wa}}" class="validate">
                        <label for="wa">WatsApp</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="tg" name="tg" type="text" value="{{$config->tg}}" class="validate">
                      <label for="tg">Telegram</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="descript" name="descript"class="materialize-textarea">{{$config->descript}}</textarea>
                      <label for="descript">Descripción 1</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="descript2" name="descript2" class="materialize-textarea">{{$config->descript2}}</textarea>
                      <label for="descript2">Descripción 2</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="phone" name="phone" class="materialize-textarea">{{$config->phone}}</textarea>
                      <label for="phone">Contacto</label>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </form>
@endsection
