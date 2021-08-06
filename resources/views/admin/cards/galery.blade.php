@extends('admin.master')

@section('title')
Galeria
@endsection

@section('breadcrumb')
<a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-shopping-basket" > Productos </span></a> /
<a href="{{ route('gallery', $card->id) }}" class="breadcrumb"><span class="mdi-image-photo-library" > Galería </span></a>

@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 m4" >
            <div class="z-depth-3 grey lighten-5" style="padding: 10px;">
                <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                    <div class="col s7" >
                        <h5><i class="mdi-image-photo-library small left"></i>Añadir</h5>
                    </div>
                </div>
                <form action="{{route('gallery.create', $card->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="row">
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
                    <h5><i class="mdi-image-photo-library small left"></i>Galería</h5>
                </div>
            </div>
            <div class="row">
                @foreach ($card->Galeria as $img)
                <div class="thumb col s6 m3">
                    <a href="{{ route('gallery.delete',  $img->id) }}" data-position="top" data-delay="50" data-tooltip="Eliminar" class="tooltipped" id="icon">
                    <i class="mdi-action-delete small"></i>
                    </a> 
                    <a href="{{ url('/uploads/'.$img->file_path.'/'.$img->file_name) }}" data-fancybox="gallery">
                        <img class="responsive-img" src="{{ url('/uploads//'.$img->file_path.'/t_'.$img->file_name) }}" alt="">
                    </a>  
                </div>
                @endforeach
                
            </div>

        </div>
    </div>
    </div>

@endsection
