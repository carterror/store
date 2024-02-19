@extends('admin.master')

@section('title')
    Productos
@endsection

@section('breadcrumb')
<a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-shopping-basket" > Productos </span></a>
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s6 m4" >
                    <h5><i class="mdi-action-shopping-basket small left"></i>Productos</h5>
                </div>
                <div class="col s6 m4 right-align">


  <!-- Dropdown Trigger -->

                    <form action="{{route('buscar')}}" method="GET">
                        @csrf
                        <div class="search-wrapper">
                            <a class='dropdown-button tooltipped' data-position="bottom" data-delay="50" data-tooltip="Filtrar" href='#' style="font-size: 30px;" data-activates='dropdown2'><i class="mdi-content-filter-list"></i></a>

                            <!-- Dropdown Structure -->
                            <ul id='dropdown2' class='dropdown-content' style="min-width: 200px; z-index: 1000;">
                                @foreach ($categorys as $cat)
                                    <li><a href="{{route('filter', $cat->id)}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                            <input id="search" type="search" name="nombre" placeholder="Search"><button type="submit" class=" tooltipped" data-position="bottom" data-delay="50" data-tooltip="Buscar" ><i class="lupa mdi-action-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col s6 m4 right-align">
                    <a class="waves-effect waves-light btn" href="{{ route('cards.create') }}" style="margin-top: 5px; z-index: 0 !important;">Nuevo</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12" style="overflow: auto;">
                    <table class="striped">
                        <thead>
                          <tr>
                            <th data-field="id">Activo</th>
                            <th data-field="id">Nombre</th>
                            <th data-field="price">Precio</th>
                            {{-- <th data-field="status">Estado</th> --}}
                            <th data-field="action"></th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($cards as $card)


                            <tr class="field-public-{{$card->id}}" @if (!$card->public)style="background-color: #ffe0b2;"@endif>
                                <td><p style="padding: 5px;"><input type="checkbox" class="filled-in box-public" id="{{$card->id}}" @if($card->public) checked @endif  /><label for="{{$card->id}}"></label></p></td>
                                <td>{{$card->name}}</td>
                                <td>{{$card->price}}</td>
                                {{-- <td>
                                    @if ($card->public)
                                    <a href="{{route('cards.public', ['public', $card->id])}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Borrador">Público</div></a>
                                    @else
                                    <a href="{{route('cards.public', ['eraser', $card->id])}}" class="btn orange darken-1 tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Publicar">Borrador</div></a>
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="{{route('gallery', $card->id)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Galeria"><i class="mdi-image-photo-library small"></i></a>
                                    <a href="{{route('cards.edit', $card)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Editar"><i class="mdi-editor-border-color small"></i></a>
                                    <a href="{{route('cards.delete', $card->id)}}" class="btn tooltipped deleter" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Eliminar"><i class="mdi-action-delete small"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                      </table>

                </div>

            </div>
            <div class="row">
                {{ $cards->links('vendor.pagination.materiallize') }}
            </div>


        </div>
    </div>

@endsection
