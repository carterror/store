@extends('admin.master')

@section('title')
    Productos
@endsection

@section('breadcrumb')
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-shopping-basket" > Productos </span></a> /
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-content-add " >Editar</span></a>
@endsection

@section('content')
<form action="{{route('cards.update', $card)}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row" style="padding: 20px">
        <div class="col s12 m8 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-action-shopping-basket small left"></i>Editar Producto "{{$card->name}}"</h5>
                </div>

                <div class="col s5 right-align">
                    <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;">Actualizar</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                        <input id="nombre" name="nombre" type="text" value="{{$card->name}}" class="validate">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="price" name="price" type="text" value="{{$card->price}}" class="validate">
                      <label for="price">Precio</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <div class="file-field input-field">
                        <select name="tipo" >
                            <option value="{{$card->cat->id}}" selected>{{$card->cat->name}}</option>
                          @foreach ($categorys as $category)
                            @if ($category->id != $card->type)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                          @endforeach
                        </select>
                        <label>Categoría</label>
                        </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="descripcion" name="descripcion" value="{{$card->description}}" type="text" class="validate">
                      <label for="descripcion">Breve Descripción</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12">
                      <label for="editor">Descripción</label>
                      <textarea id="editor" name="descripcion1">{!!$card->description_pre!!}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
        <div class="col s12 m4" style="margin-top: 10px;">
          <form action="{{route('cards.photo', $card)}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row z-depth-3 grey lighten-5" style="border-bottom: 1px solid black; padding: 10px; margin: 0px; ">
              <div class="col s12" >
                  <h5><i class="mdi-action-shopping-basket small left"></i>Foto</h5>
              </div>
          </div>
          <img class="materialboxed z-depth-2" style="border-radius: 5px;" width="100%" height="300px;" src="{{asset('uploads/'.$card->path)}}">
          <div class="row grey lighten-5 z-depth-2">
            <div class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text"/>
                    <div class="btn">
                      <span>File</span>
                      <input type="file" name="photo" value="{{$card->path}}" accept='image/*' />
                    </div>
                  </div>
                </div>
                <div class="col s4 right-align">
                  <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;">Actualizar</button>
              </div>
              </div>

            </div>
    </div>
  </div>

  </form>
  <script src="{{ url('/dist/ckeditor.js') }}"></script>
  <script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link' , '|', 'numberedList', 'bulletedList', '|', 'undo', 'redo', '|', 'insertTable', 'blockQuote']
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
  </script>
@endsection
