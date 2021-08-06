@extends('admin.master')

@section('title')
Destinatarios
@endsection

@section('breadcrumb')
<a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-social-people" > Destinatarios </span></a> 
@endsection

@section('content')

<div class="row" style="padding: 10px;">
    <div class="col s12 m4" style="margin-top: 15px;" >
            <div class="z-depth-3 grey lighten-5" style="padding: 10px;">
                <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                    <div class="col s12" >
                        <h5><i class="mdi-social-people small left"></i>Nuevo</h5>
                    </div>
                </div>
                <form action="{{route('recipient.store')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="email" name="email" type="text" class="validate">
                            <label for="email">Correo Electrónico</label>
                        </div>
                    </div>
                    <div class="row" style="margin: 0px !important;">
                        <div class="input-field col s12"  style="margin: 0px !important;">
                            <button class="waves-effect waves-light btn" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col s12 m8" style="margin-top: 15px;">
            <div class="z-depth-3 grey lighten-5" style="padding: 10px;">
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Destinatarios</h5>
                </div>
            </div>
            <div class="row">
                <div class="col s12" style="overflow: auto;">
                    <table class="striped">
                        <thead>
                          <tr>
                              <th data-field="id">Nombre</th>
                              <th data-field="name">Correo</th>
                              <th data-field="action"></th>
                          </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($recipients as $recipient)
                                <tr>
                                    <td>{{$recipient->name}}</td>
                                    <td>{{$recipient->email}}</td>
                                    <td>
                                        <a href="{{route('recipient.delete', $recipient)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Eliminar"><i class="mdi-action-delete small"></i></a>
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
                {{ $recipients->links('vendor.pagination.materiallize') }}
            </div>
           

        </div>
    </div>
    </div>

@endsection
