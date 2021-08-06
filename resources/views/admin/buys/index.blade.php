@extends('admin.master')

@section('title')
Compras
@endsection

@section('breadcrumb')
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-shopping-cart" >Compras</span></a>
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s10" >
                    <h5><i class="mdi-action-shopping-cart small left"></i>Compras</h5>
                </div>
            </div>
            <div class="row">
                <div class="col s12" style="border-bottom: 1px solid black; overflow: auto;">
                    <table class="striped">
                        <thead>
                          <tr>
                              <th data-field="id">Usuario</th>
                              <th data-field="phone">Teléfono</th>
                              <th data-field="status">Estado</th>
                              <th data-field="price">Precio</th>
                              <th data-field="date">Fecha</th>
                              <th data-field="action"></th>
                          </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($buys as $buy)

                            <tr>
                                <td>{{$buy->name}}</td>
                                <td>{{$buy->phone}}</td>
                                <td>
                                    @if ($buy->status == 0)
                                        <div class="blue lighten-2 center-align" style="padding: 5px; color: #fff;">Espera</div>
                                    @elseif ($buy->status == 1)
                                        <div class="teal lighten-2 center-align" style="padding: 5px; color: #fff;">Aceptado</div>
                                    @else
                                        <div class="red lighten-2 center-align" style="padding: 5px; color: #fff;">Cancelado</div>
                                    @endif  
                                </td>
                                <td>{{"$ ".$buy->total.' '}}</td>
                                <td>{{$buy->created_at}}</td>
                                <td>
                                    @if ($buy->status == 0)
                                        <a href="{{route('buys.limpiar', $buy->id)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Completar"><i class="mdi-action-done small"></i></a>
                                        <a href="{{route('buys.delete', $buy->id)}}" class="btn tooltipped red lighten-2" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Cancelar"><i class="mdi-navigation-cancel small"></i></a>
                                    @elseif ($buy->status == 1)
                                        <a href="{{route('buys.delete', $buy->id)}}" class="btn tooltipped red lighten-2" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Cancelar"><i class="mdi-navigation-cancel small"></i></a>
                                    @else
                                        <a href="{{route('buys.limpiar', $buy->id)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Completar"><i class="mdi-action-done small"></i></a>
                                    @endif  

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
                {{ $buys->links('vendor.pagination.materiallize') }}
            </div>
           

        </div>
    </div>

@endsection
