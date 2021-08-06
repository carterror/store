@extends('layouts.master')

@section('title')
Compra
@endsection


@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s10" >
                    <h5><i class="mdi-action-shopping-cart small left"></i>Compra</h5>
                </div>
            </div>

            <div class="row">
                <div class="col s12" >
                    <div class="row">
                        <div class="col s6">Usuario</div>
                        <div class="col s6">{{$details->name}}</div>
                    </div>
                    <div class="row">
                        <div class="col s6">Teléfono</div>
                        <div class="col s6">{{$details->phone}}</div>
                    </div>
                    <div class="row">
                        <div class="col s6">Estado</div>
                        <div class="col s6">
                            @if ($details->status == 0)
                                <div class="blue lighten-2 center-align col s12 m5" style="padding: 5px; color: #fff;">* En espera</div>
                            @elseif ($details->status == 1)
                                <div class="teal lighten-2 center-align col s12 m5" style="padding: 5px; color: #fff;">* Aceptado</div>
                            @else
                                <div class="red lighten-2 center-align  col s12 m5" style="display: block !important; padding: 5px; color: #fff;">* Cancelado</div>
                            @endif    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">Precio</div>
                        <div class="col s6">{{$details->total.' '.$config->current}}</div>
                    </div>
                    <div class="row">
                        @if ($details->status == 0)
                        <div class="col s11 m8">
                            <div  class="input-field col s9">
                                <i class="mdi-content-link prefix"></i>
                                <input id="referir" type="text" value="{{route('carrito.show', $carritos)}}" class="validate">
                                <label for="referir">Link Permanente</label>
                            </div>
                                <div  class="input-field col s3">
                                <button class="waves-effect waves-light btn-large tooltipped" style="float: left;" data-position="top" data-delay="50" data-tooltip="Copiar" onclick="setClipboardCard()"><i class="mdi-content-content-copy"></i></button>
                                </div>
                        </div>
                        <div  class="input-field col s12 m4">
                            <a href="{{route('carrito.show', $carritos)}}" class="btn-large waves-effect waves-light" style="padding: 0px 15px;"><i class="mdi-content-link left"></i>Link Permanente</a>
                        </div>
                        @endif
                    </div>

                </div>
                
            </div>

        </div>
    </div>

@endsection
