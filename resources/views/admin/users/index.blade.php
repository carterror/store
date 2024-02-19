@extends('admin.master')

@section('title')
    Usuarios
@endsection

@section('breadcrumb')
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-social-people"> Usuarios</span></a>
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s10" >
                    <h5><i class="mdi-social-people small left"></i>Usuarios</h5>
                </div>
                <div class="col s2">
                    <a class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;"><i class="mdi-content-add left" style="margin: 0px;"></i>Nueva</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12" style="border-bottom: 1px solid black;">
                    <table class="responsive-table striped">
                        <thead>
                          <tr>
                            <th data-field="id">Nombre</th>
                            <th data-field="name">Correo</th>
                            <th data-field="price">Teléfono</th>
                            <th data-field="puntos">Puntos</th>
                            <th data-field="action" style="width: 200px;"></th>
                          </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($users as $user)
                            
                            
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->puntos}}</td>
                                <td>
                                    <a href="" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Editar"><i class="mdi-action-done small"></i></a>
                                    <a href="{{route('users.delete', $user->id)}}" class="btn tooltipped deleter" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Eliminar"><i class="mdi-action-delete small"></i></a>
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
                {{ $users->links('vendor.pagination.materiallize') }}
            </div>
           

        </div>
    </div>

@endsection
