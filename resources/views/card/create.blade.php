@extends('layouts.master')

@section('title')
    Card
@endsection

@section('content')

    <div class="row">
        <div class="col s4" >
            <img class="materialboxed z-depth-2" style="border-radius: 5px;" width="100%" height="300px;" src="{{asset('img/'.$card->type.'.png')}}">
        </div>
        <div class="col s7" >
            <h2 style="margin: 10px !important;"> {{$card->name}}</h2>
            <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 10px;"></div>
            <h6 style="padding: 10px;"> {{$card->description}}</h6>
            <p style="padding: 10px;"> {{$card->description_pre}}</p>
        </div>
    </div>

    <div class="row" style="">
        <div class="col s5 offset-s1 z-depth-2 grey lighten-5" style="border-radius: 5px; padding: 15px; border-left: 5px solid rgb(33, 129, 33);">
            Valor: 
            <h3>{{$card->price}} USD</h3>
        </div>
        <div class="col s5 grey lighten-5 z-depth-2" style="border-radius: 5px; padding: 15px; border-left: 5px solid rgb(33, 129, 33);">
            Precio: 
            <h3>{{$card->price $config->current}}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col s9 offset-s3 right-align" style="border-radius: 5px; margin-top: 15px;">
            <form action="">
                <button type="submit" style="display: inline; float: right;" max-value="2" class="waves-effect waves-light btn grey-text text-lighten-5">$ Comprar</button>
            </form>
        </div>
    </div>

@endsection
