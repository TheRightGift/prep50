<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <script >window.laravel = {csrfToken:'{{csrf_token() }}' }</script>

        <title>PREP50 | JAMB Preparatory Application, Innovative JAMB Preparatory App.</title>

        <!-- Fonts -->
        <!--link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"-->
        {{-- <link href="{{ asset('fonts/material-icons.css') }}" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/prep50.css') }}" rel="stylesheet"> --}}
    </head>
    <body>
        {{-- <div id="app">
              <welcome></welcome>
        </div>  --}}

        <script src="/js/app.js"></script>
        {{-- <script src="{{ asset('./js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('./js/materialize.min.js') }}"></script>
        <script src="{{ asset('./js/prep50.js') }}"></script> --}}
    </body>
</html>
