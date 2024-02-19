<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
    <title>Admin | @yield('title')</title>
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <link rel="icon" href="{{ asset('dist/logo.png') }}" sizes="32x32">
    <!--  Android 5 Chrome Color-->
    <meta name="theme-color" content="#EE6E73">
    <!-- CSS-->

    <link href="{{ asset('dist/css/ghpages-materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" href="{{ asset('dist/css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/fancybox/jquery.fancybox.css?v='.time()) }}">
    <style>
      .disabled {
        pointer-events: none;
      }
      .search-wrapper input#search {
            color: #000 !important;
            font-size: 14px;
            font-weight: 200;
            width: 50%;
            height: 40px;
            margin: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 15px 0 10px;
            border: 0;
        }
        .search-wrapper button {
            border: none;
            color: black;
            background-color: transparent;
            font-size: 30px;
            position: absolute;
            z-index: 999;
            margin-left: -2%;
        }
        .search-wrapper button:hover {
            color: greenyellow;
            transition: 2s;
        }
    </style>
  </head>
  <body>
    <header>
      <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle"><i class="mdi-navigation-menu iconn"></i></a></div>
      <ul id="dropdown1" class="dropdown-content blue-grey darken-4">
        <li><a class="disabled">{{ Auth::user()->name }}</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('pass') }}" class="">Contraseña</a></li>
        <li class="divider"></li>
        <form method="POST" action="{{ route('logout') }}">
        <li>
            @csrf
            <a :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </li>
        </form>
      </ul>

      <nav class="blue-grey darken-4">
        <div class="nav-wrapper">
          <ul class="right">
            <li><a href="{{ route('dashboard', 'all') }}" ><i class="mdi-device-devices left"></i>Página</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="" data-activates="dropdown1"><i class="mdi-action-account-circle left"></i>{{ Auth::user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
          </ul>
        </div>
      </nav>
      <nav class="blue-grey darken-3">
        <div class="nav-wrapper">
          <div class="col s12" style="margin-left: 10px;">
              <a href="{{ route('admin') }}" class="breadcrumb"><span class="mdi-action-home" > Inicio </span></a> /
            @section('breadcrumb')
            @show
          </div>
        </div>
      </nav>
      <ul id="nav-mobile" class="side-nav fixed grey lighten-5">
        <li class="logo">
          <a id="logo-container" href="{{ route('admin') }}" class="brand-logo" style="font-size: x-large;">
            Administración
          </a>
        </li>
        <li class="bold {{request()->routeIs('admin') ? 'teal lighten-3' : ''}}"><a href="{{route('admin')}}" class="waves-effect waves-teal active"><i class="mdi-action-home small left"></i>Inicio</a></li>
        <li class="bold {{request()->routeIs('recipient.index') ? 'teal lighten-3' : ''}}"><a href="{{route('recipient.index')}}" class="waves-effect waves-teal active"><i class="mdi-social-people small left"></i>Responsables</a></li>
        <li class="bold {{request()->routeIs('addresses') ? 'teal lighten-3' : ''}}"><a href="{{route('addresses')}}" class="waves-effect waves-teal active"><i class="mdi-action-home small left"></i>Domicilio</a></li>
        <li class="bold {{request()->routeIs('buys') ? 'teal lighten-3' : ''}}"><a href="{{route('buys')}}" class="waves-effect waves-teal"><i class="mdi-action-shopping-cart small left"></i>Compras</a></li>
        <li class="bold {{request()->routeIs('category') ? 'teal lighten-3' : ''}}"><a href="{{route('category')}}" class="waves-effect waves-teal"><i class="mdi-action-view-module small left"></i> Categorias</a></li>
        <li class="bold {{request()->routeIs('cards') ? 'teal lighten-3' : ''}}"><a href="{{route('cards')}}" class="waves-effect waves-teal"><i class="mdi-action-shopping-basket small left"></i> Productos</a></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion grey lighten-5">
            <li class="bold {{request()->routeIs('config') || request()->routeIs('fondos') ? 'teal lighten-3' : ''}}"><a class="collapsible-header  waves-effect waves-teal {{request()->routeIs('config') || request()->routeIs('fondos') ? 'active' : ''}}"><i class="mdi-device-now-widgets small left"></i>Ajustes<i class="mdi-navigation-arrow-drop-down right"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li class="{{request()->routeIs('config') ? 'active' : ''}}"><a href="{{route('config')}}">Generales</a></li>
                  <li class="{{request()->routeIs('fondos') ? 'active' : ''}}"><a href="{{route('fondos')}}">Fotos</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <main>

      @section('content')
      @show

    </main>
    {{-- <footer class="page-footer" style="background-color: transparent;">

      <div class="footer-copyright blue-grey darken-4">
        <div class="container">
        © 2014-2015 Materialize, All rights reserved.
        <a class="grey-text text-lighten-4 right" href="https://github.com/Dogfalo/materialize/blob/master/LICENSE">MIT License</a>
        </div>
      </div>
    </footer> --}}
    <!--  Scripts-->

    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>

    {{-- <script>if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js"><\/script>'); }
    </script> --}}

    <script src="{{ asset('dist/js/materialize.js') }}"></script>
    <script src="{{ asset('dist/js/init.js') }}"></script>
    <script src="{{ asset('dist/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('dist/fancybox/jquery.fancybox.js') }}"></script>
    @include('components.auth-validation-errors')
    <!-- Twitter Button -->
    {{-- <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> --}}



    <!--  Google Analytics  -->
    {{-- <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-56218128-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
    </script> --}}
  </body>
</html>
