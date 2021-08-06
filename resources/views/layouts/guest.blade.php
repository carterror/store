<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('dist/css/materialize.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
        <style>
            body{

                background: -webkit-linear-gradient(90deg, rgba(54,76,96,1)27%, rgba(41,70,84,1)90% );
                background: -o-linear-gradient(90deg, rgba(54,76,96,1)27%, rgba(41,70,84,1)90% );
                background: -moz-linear-gradient(90deg, rgba(54,76,96,1)27%, rgba(41,70,84,1)90% );
                background: linear-gradient(90deg, rgba(54,76,96,1)27%, rgba(41,70,84,1)90% );

            }
        </style>
    </head>
    <body>
        
        <div class="container">
            <div class="row" style="margin-top: 100px;">
                <div class="col s10 m6 offset-s1 offset-m3" style="">
                    {{ $slot }}
                 </div> 
             </div>
            </div>

        <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
        <script src="{{ asset('dist/js/materialize.js') }}"></script>
        @include('components.auth-validation-errors')
    </body>
</html>
