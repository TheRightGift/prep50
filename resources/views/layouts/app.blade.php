<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

     
     <!-- Fonts -->
         <link href="{{ asset('fonts/material-icons.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prep50.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @include('vendor.sweetalert.cdn')
@include('vendor.sweetalert.view')
            <app></app>
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
         <script src="{{ asset('./js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('./js/materialize.min.js') }}"></script>
        <script src="{{ asset('./js/prep50.js') }}"></script>
        {{-- <script src="{{ asset('sweetalert2.all.min.js')}}"></script> --}}

        {{-- <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script> --}}
       <script>
        //    M.AutoInit();
            $(document).ready(function() {
                // $('select').material_select();
                $(".button-collapse").sideNav();
                $('.datepicker').datepicker();
                // $('.datepicker').pickadate({
                //     selectMonths: true, // Creates a dropdown to control month
                //     selectYears: 15, // Creates a dropdown of 15 years to control year,
                //     today: 'Today',
                //     clear: 'Clear',
                //     close: 'Ok',
                //     closeOnSelect: false, // Close upon selecting a date,
                //     container: undefined // ex. 'body' will append picker to body
                // });
            });
            
       </script>
       <script>
        function showSuccessMessage(message, title) {
            var title = title ? title : 'Success!';
            var message = message ? message : '';
            var type = 'success';
            alert(type, title, message)
        }
        function showInfoMessage(message, title) {
            var title = title ? title : 'Information!';
            var message = message ? message : '';
            var type = 'info';
            alert(type, title, message)
        }

        function showWarningMessage(message, title) {
            var title = title ? title : 'Warning!';
            var message = message ? message : '';
            var type = 'warning';
            alert(type, title, message)
        }

        function showErrorMessage(message, title) {
            var title = title ? title : 'Oops';
            var message = message ? message : 'Something went wrong!';
            var type = 'error';
            alert(type, title, message)
        }


        function showMessage(message, title, type) {
            var title = title ? title : '';
            var message = message ? message : '';
            var type = type ? type : '';
            alert(type, title, message)
        }

        function alert(error_type, error_title, error_message) {

            Swal.fire({
                title: error_title,
                text: error_message,
                type: error_type,
                showConfirmButton: false,
                showCloseButton: true
            });
        }
    </script>
</body>
</html>
