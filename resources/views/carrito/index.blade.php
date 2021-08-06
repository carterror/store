@extends('layouts.master')

@section('title')
Carrito
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s12" >
                    <h5><i class="mdi-action-shopping-cart small left"></i>Carrito</h5>
                </div>
                
            </div>
            <div class="row">
                <div class="col s12" style="border-bottom: 1px solid black; overflow: auto;">
                    <table class="bordered striped">
                        <thead>
                          <tr>
                            <th data-field="id">Producto</th>
                            <th data-field="cant"></th>

                              <th data-field="name">Precio</th>
                              <th data-field="action"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $buy)
                            
                            <tr class="product-{{$buy->id}}">
                                <td colspan="2"><span class="inventario">{{$productos->where('card_id', $buy->id)->first()->inventario}}</span>x {{$buy->name}}</td> 
                                <td><span class="total">{{$buy->price*$productos->where('card_id', $buy->id)->first()->inventario}}</span> {{$config->current}}</td>
                                <td>
                                  <a href="{{route('add', [$carrito->id, $buy->id])}}" class="in_car btn" style="padding: 0px 15px;" ><i class="mdi-image-exposure-plus-1 small"></i></a>
                                  <a href="{{route('sub', [$carrito->id, $buy->id])}}" class="in_car btn" style="padding: 0px 15px;"><i class="mdi-image-exposure-minus-1 small"></i></a>
                                </td>
                            </tr>
                          @endforeach
                          <tr>
                            <td><b class="cant">{{$carrito->productSize()}}</b></td>
                            <td><b>Total</b></td>
                            <td><b><span class="totales">{{$total}}</span> {{$config->current}}</b></td>
                            <td><a href="{{route('limpiar')}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Limpiar">Vaciar</a></td>
                        </tr>
                        </tbody>
                        <tfoot>
                           
                        </tfoot>
                      </table>
                      
                </div>
                
            </div>
            @if ($domi->count())
            <div class="row compra" style="padding: 10px; margin-top: 15px;">

              <ul class="collection with-header grey lighten-5">
                <li class="collection-header grey lighten-5"><h5>Domicilios</h5></li>
                @foreach ($domi as $d)
                    
                <li class="collection-item grey lighten-5"><i class="mdi-communication-location-on tiny left"></i> {{$d->address}}</li>

                @endforeach
              </ul>
            </div>
            @endif

            <div class="row compra" style="padding: 10px; margin-top: 15px;">
              @if ($total>0)
                    <div class="col s12">
                        <h5><i class="mdi-action-shopping-cart small left"></i>Completar</h5>
                    </div>
                    {!! Form::open(['url' => route('order')]) !!}
            </div>
                    <div class="row form-compra" style="padding: 5px 10px;">
                        <div class="col s12">
                          <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="nombre" name="name" type="text" class="validate">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="input-field col s12 m6">
                              <input id="phone" name="phone" type="text" class="validate">
                              <label for="phone">Teléfono</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <textarea id="address" name="address" class="materialize-textarea"></textarea>
                              <label for="address">Dirección</label>
                            </div>
                          </div>
                        </div>
                        <div class="col s5">
                          <button type="submit" class="waves-effect waves-light btn grey-text text-lighten-5" style="">Comprar</button>
                      </div>
                      </div>

                {!! Form::close() !!}
                @else

                  <div class="col s12">
                      <h5 class="red-text text-accent-3"><i class="mdi-action-shopping-cart small left"></i>Carrito Vacio</h5>
                  </div>
                
                @endif
              </div>
            </div>
        
        </div>
    </div>

@endsection
