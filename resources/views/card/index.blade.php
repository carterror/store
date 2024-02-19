@extends('layouts.master')

@section('title')
    Producto
@endsection

@section('content')

    <div class="row">
        <div class="col s12 m4" >
            <img class="materialboxed z-depth-2" style="border-radius: 5px;" width="100%" height="300px;" src="{{asset('uploads/'.$card->path)}}">
        </div>
        <div class="col s12 m7" >
            <h2 style="margin: 10px !important;"> {{$card->name}}</h2>
            <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 10px;"></div>
            <h4 style="padding: 10px;"> {{$card->description}}</h4>
            <h5 style="padding: 10px;"> {!!$card->description_pre!!}</h5>
        </div>
    </div>

    <div class="row">
        @foreach ($card->Galeria as $img)
        <div class="thumb col s6 m3">
            <a href="{{ url('/uploads/'.$img->file_path.'/'.$img->file_name) }}" data-fancybox="gallery">
                <img class="responsive-img" src="{{ url('/uploads//'.$img->file_path.'/t_'.$img->file_name) }}" alt="">
            </a>  
        </div>
        @endforeach
        
    </div>

    <div class="row" style="">
        <div class="col s12 m4 offset-m8 z-depth-2 grey lighten-5" style="border-radius: 5px; padding: 15px; border-left: 5px solid rgb(33, 129, 33);">
            Agregar por:             
            @include('carrito.form')
            <h5>{{$card->price.' '.$config->current}}</h5>
        </div>
    </div>

@endsection
