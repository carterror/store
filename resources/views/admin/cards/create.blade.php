@extends('admin.master')

@section('title')
    Productos
@endsection

@section('breadcrumb')
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-shopping-basket" > Productos </span></a> /
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-content-add " >Nuevo</span></a>
@endsection

@section('content')
<form action="{{route('cards.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-action-shopping-basket small left"></i>Nuevo Producto</h5>
                </div>

                <div class="col s5 right-align">
                    <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;">Guardar</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                        <input id="nombre" name="nombre" type="text" class="validate">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="price" name="price" type="text" class="validate">
                      <label for="price">Precio</label>
                    </div>
                  </div>
                  <div class="row">
                     <div class="input-field col s6">
                        <div class="file-field input-field">
                            <input class="file-path validate" type="text"/>
                            <div class="btn">
                              <span>File</span>
                              <input type="file" name="photo" accept='image/*' />
                            </div>
                          </div>
                    </div>
                    <div class="input-field col s6">
                      <div class="file-field input-field">
                        <select name="tipo" >
                          <option value="" disabled selected>Elegir Categoria</option>
                          @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                        <label>Categoria</label>
                        </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="descripcion" name="descripcion" type="text" class="validate">
                      <label for="descripcion">Breve Descripción</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12">
                      <label for="editor">Descripción</label>
                      <textarea id="editor" name="descripcion1"></textarea>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                        
                    </div>
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
