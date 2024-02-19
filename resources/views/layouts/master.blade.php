<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <link rel="icon" href="{{ asset('dist/logo.png') }}" sizes="32x32">
  <title>{{ $config->name }} @yield('title')</title>

  <!-- Fonts -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

  <!-- Styles -->

  <link rel="stylesheet" href="{{ asset('dist/css/materialize.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/fancybox/jquery.fancybox.css?v='.time()) }}">

  {{-- <link rel="stylesheet" href="{{ asset('dist/app.css') }}"> --}}
  <style>
    .disabled {
      pointer-events: none;
    }
    .btn, .btn-large {
        background-color: {{$config->color2}} !important;
    }

    .blue-grey.darken-4 {
        background-color: {{$config->color1}} !important;
    }

    {}
    .paypal1 {color: #003087; font-size: 22px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-style: italic;}
    .paypal2 {color: #009CDE; font-size: 22px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-style: italic;}
    .paypal3 {color: #000000; font-size: 17px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
    .paypal4 {color: #fafafa; font-size: 17px; font-family: Arial, Helvetica, sans-serif; }
    .paypal5 {color: #3c3c3c; font-size: 18px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-style: italic; }
    .myButton0a {width: 250px; background-color:#FFC439; border-radius:4px; display:inline-block; cursor:pointer; padding:12px; text-align:center; text-decoration:none; margin-bottom: 5px; }
    .myButton0a:hover {background-color:#fcba1f; }
    .myButton0a:active {position:relative; top:1px; }
  </style>


</head>
<body>
  <div class="navbar-fixed">
  <nav class="blue-grey darken-4" role="navigation">
    <div class="nav-wrapper container">

      <a id="logo-container" href="{{ url('/dashboard/all') }}" class="logo" style="padding-left: 10px;">{{$config->name}}</a>

      <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('/dashboard/all') }}" ><i class="mdi-action-home left"></i>Inicio</a></li>
                <li><a href="{{ route('carrito.index') }}" ><i class="mdi-action-shopping-cart left"></i><span class="carrito-red red accent-4" style="padding: 3px;">{{$carrito->productSize()}}</span></a></li>
      </ul>

      <a href="{{ route('carrito.index') }}" class="carro btn-large waves-effect waves-light blue-grey darken-4" style="position: fixed; top: 2px; right: 5px; border-radius: 5px !important; box-shadow: none;"><i class="mdi-action-shopping-cart left"></i> <span class="carrito-red red accent-4" style="padding: 3px;">{{$carrito->productSize()}}</span></a>

      <ul id="nav-mobile" class="side-nav blue-grey darken-4" style="opacity: .9;">
        <li><a id="logo-container" href="{{ url('/dashboard/all') }}">{{$config->name}}</a></li>

        <li><a id="logo-container" href="{{ url('/dashboard/all') }}"><i class="mdi-action-home left"></i>Inicio</a></li>
        <li><a id="logo-container" href="{{ route('carrito.index') }}"><i class="mdi-action-shopping-cart left"></i> Carrito <span class="carrito-red badge red accent-4 grey-text text-lighten-5" style="font-size: large; ">{{$carrito->productSize()}}</span></a></li>
      </ul>

      <a href="#" data-activates="nav-mobile" class="button-collapse grey-text text-lighten-5"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
  </div>
  <div id="index-banner" class="parallax-container" style="padding-top: 50px;">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        @if (!is_null($config->descript))
        <div class="row center">
          <h5 class="header col s12 light" style="background-color: rgba(0, 0, 0, 0.685); border-radius: 5px; padding: 10px;">{{$config->descript}}</h5>
        </div>
        @endif
        {{-- <div class="row center">
          <a href="" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
        </div> --}}
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{asset('uploads/banner1.jpg?v='.time())}}" alt="Unsplashed background img 2"></div>
  </div>
  <div class="row">
    <div class="container">
        <div class="section">

      <!--   Icon Section   -->

      @section('content')
      @show


    </div>
  </div>
</div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      @if (!is_null($config->descript2))
        <div class="container">
          <div class="row center">
            <h5 class="header col s12 light" style="background-color: rgba(0, 0, 0, 0.685); border-radius: 5px; padding: 10px;">{{$config->descript2}}</h5>
          </div>
      </div>
      @endif
    </div>
    <div class="parallax"><img src="{{asset('uploads/banner2.jpg?v='.time())}}" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer blue-grey darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Contacto</h5>
          <p class="grey-text text-lighten-4">{!! $config->phone !!}</p>
        </div>
        <div class="col l6 s12">
          <h5 class="white-text">Redes Sociales</h5>
          <ul>
            @if($config->fb!=null)
              <a class="fancybox-share__button fancybox-share__button--fb" href="{{ $config->fb}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m287 456v-299c0-21 6-35 35-35h38v-63c-7-1-29-3-55-3-54 0-91 33-91 94v306m143-254h-205v72h196"></path></svg><span>Facebook</span></a>
            @endif
            @if($config->ig!=null)
              <a class="fancybox-share__button fancybox-share__button--ig" href="{{ $config->ig}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg><span>Instagram</span></a>
            @endif
            @if($config->wa!=null)
              <a class="fancybox-share__button fancybox-share__button--wa" href="{{ $config->wa}}"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg><span>WhatsApp</span></a>
            @endif
            @if($config->tg!=null)
              <a class="fancybox-share__button fancybox-share__button--tg" href="{{ $config->tg}}"><svg viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"></path></svg><span>Telegram</span></a>
            @endif
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright grey darken-4" >
      <div class="container">
      Producido por <a class="brown-text text-lighten-3" href="https://atlas.expresscuba.com/">GoDjango</a>
      </div>
    </div>
  </footer>

<a class="back-to-top btn-floating btn-large waves-effect waves-light"><i class="mdi-navigation-expand-less"></i></a>

    <!-- Scripts -->
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/materialize.js') }}"></script>
    <script src="{{ asset('dist/js/init.js') }}"></script>
    <script src="{{ asset('dist/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('dist/fancybox/jquery.fancybox.js') }}"></script>
    @include('components.auth-validation-errors')
  </body>
</html>
