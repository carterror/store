@extends('admin.master')

@section('title')
Fondos
@endsection

@section('breadcrumb')
<a href="{{ route('config') }}" class="breadcrumb"><span class="mdi-device-now-widgets small" > Ajustes </span></a> /
<a href="{{ route('fondos') }}" class="breadcrumb"><span class="mdi-editor-insert-photo" > Fondos </span></a>
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 m4" >
            <div class="z-depth-3 grey lighten-5" style="padding: 10px;">
                <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                    <div class="col s7" >
                        <h5><i class="mdi-editor-insert-photo small left"></i>Actualizar</h5>
                    </div>
                </div>
                <form action="{{route('fondos.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                              <select name="tipo" >
                                <option value="" disabled selected>Fondo...</option>
                                <option value="banner1">Fondo 1</option>
                                <option value="banner2">Fondo 2</option>
                              </select>
                              <label>Imagen de fondo</label>
                              </div>
                        </div>
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <input class="file-path validate" type="text"/>
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" name="photo" accept='image/*' />
                                </div>
                              </div>
                        </div>

                    </div>
                    <div class="row" style="margin: 0px !important;">
                        <div class="input-field col s12"  style="margin: 0px !important;">
                            <button class="waves-effect waves-light btn" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col s12 m8" >
            <div class="z-depth-3 grey lighten-5" style="padding: 10px;">
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-editor-insert-photo small left"></i>Fondos "1 y 2"</h5>
                </div>
            </div>
            <div class="row">
                <div class="thumb col s6">
                    <a href="{{ url('/uploads/banner1.jpg') }}" data-fancybox="gallery">
                        <img class="responsive-img" src="{{ url('/uploads/banner1.jpg?v='.time()) }}" alt="Fondo 1">
                    </a>
                </div>
                <div class="thumb col s6">
                    <a href="{{ url('/uploads/banner2.jpg') }}" data-fancybox="gallery">
                        <img class="responsive-img" src="{{ url('/uploads/banner2.jpg?v='.time()) }}" alt="Fondo 2">
                    </a>
                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="row" style="padding: 20px">
        <div class="col s12 m4" >
            <div class="z-depth-3 grey lighten-5" style="padding: 10px;">
                <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                    <div class="col s7" >
                        <h5><i class="mdi-editor-insert-photo small left"></i>Tema</h5>
                    </div>
                </div>
                <form action="{{route('tema')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="row">
                        <div class="input col s6">
                            <label for="exampleColorInput" class="form-label" style="font-size: 20px;">Color Principal</label>
                            <input type="color" name="color1" class="form-control form-control-color" value="{{$config->color1}}" title="Choose your color" style="display: block;">
                        </div>
                        <div class="input col s6">
                            <label for="exampleColorInput" class="form-label" style="font-size: 20px;">Color Secundario</label>
                            <input type="color" name="color2" class="form-control form-control-color" value="{{$config->color2}}" title="Choose your color" style="display: block;">
                        </div>
                    </div>
                    <div class="row" style="margin: 0px !important;">
                        <div class="input-field col s12"  style="margin: 0px !important;">
                            <button class="waves-effect waves-light btn" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

@endsection
