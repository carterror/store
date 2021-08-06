@extends('admin.master')

@section('title')
    Configuraciones
@endsection

@section('breadcrumb')
    <a href="{{ route('config') }}" class="breadcrumb"><span class="mdi-device-now-widgets small" > Resumen </span></a>
@endsection

@section('content')
    <div class="row" style="padding: 20px;">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-device-now-widgets small left"></i>Panel de Administración</h5>
                </div>
            </div>
            <div class="row">

              </div>

        </div>
        
        <div class="col s6 m3" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Visitas hoy</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h1 style="font-weight: bold; margin: 0px;">{{$users}}</h1>
              </div>
            
            </div>
          </div>
        </div>

        <div class="col s6 m3" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Productos</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h1 style="font-weight: bold; margin: 0px;">{{$card}}</h1>
              </div>
            
            </div>
          </div>
        </div>
    </div>
    <div class="row" style="padding: 20px;">
        <div class="col s6 m3" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Ordenes</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h1 style="font-weight: bold; margin: 0px;">{{$count}}</h1>
              </div>
            
            </div>
          </div>
        </div>

        <div class="col s6 m3" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Ventas</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h1 style="font-weight: bold; margin: 0px;">{{$buys}}</h1>
              </div>
            
            </div>
          </div>
        </div>

        <div class="col s6 m3" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Ordenes Hoy</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h1 style="font-weight: bold; margin: 0px;">{{$counth}}</h1>
              </div>
            
            </div>
          </div>
        </div>

        <div class="col s6 m3" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Ventas Hoy</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h1 style="font-weight: bold; margin: 0px;">{{$buysh}}</h1>
              </div>
            
            </div>
          </div>
        </div>

      </div>

@endsection
