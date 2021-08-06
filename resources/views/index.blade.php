@extends('layouts.master')

@section('title')
    Inicio
@endsection

@section('content')


          <ul id="dropdown2" class="dropdown-content blue-grey darken-4" style="z-index: 999;">
              <li><a href="{{route('dashboard', 'all')}}">Todas</a></li>
            @foreach ($categories as $category)
              <li><a href="{{route('dashboard', $category->id)}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
          <div class="row">
            <div class="col s12 l4">
              <nav class="" style="background-color: transparent; box-shadow: 0px 0px 0px transparent;">
                <div class="nav-wrapper">
                  <ul class="">
                    <li><a class="dropdown-button center blue-grey darken-4" href="#!" data-activates="dropdown2">CATEGORIAS<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                  </ul>
                </div>
              </nav>
            </div>
            
            <div class="col s12 l8">
              <nav class="blue-grey darken-4">
                <div class="nav-wrapper">
                  <form method="POST" action="{{route('buscar')}}">
                    @csrf
                    <div class="input-field">
                      <input id="search" type="search" name="buscar" style="height: 64px;" required>
                      <label for="search"><i class="mdi-action-search"></i></label>
                      <i class="mdi-navigation-close"></i>
                    </div>
                  </form>
                </div>
              </nav>
    
            </div>
          </div>

        @if (!$conteo)
          @if ($id!="all")
            <h2 class="red-text text-accent-3">No se encontraron productos bajo "{{$id}}"</h2>
          @endif
        @else
          @if ($id!="all")
              <h3 class="red-text text-accent-3">Resultados de buscar: "{{$id}}"</h3>    
          @endif
          @foreach ($cards as $card)
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light ">
                    <a href="{{route('card', $card->id)}}"><img class="activator" src="{{asset('uploads/t_'.$card->path)}}"></a>
                    <div class="" style="position: absolute; bottom: 1px; right: 1px; padding: 10px; font-weight: bold; background-color: rgba(255, 255, 255, 0.699);">{{$card->price.' '.$config->current}}</div>
                    </div>
                    <div class="card-content" style="padding: 0px 0px 0px 10px;">
                        <span class="card-title bold grey-text text-darken-4">{{$card->name}}</span>
                    </div>
                    <div class="card-action right-align" style="padding: 10px;">
                    @include('carrito.form')
                    <a href="{{route('card', $card->id)}}" class="waves-effect waves-light btn grey-text text-lighten-5">Ver</a>
                    </div>
                </div>
            </div>
          @endforeach
        @endif


  <div class="row">
    <div class="col s12">
      {{ $cards->links('vendor.pagination.materiallize') }}
    </div>
  </div>
@endsection
