<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/Trumbowyg/ui/trumbowyg.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/kartik-file/css/fileinput.min.css') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','default')| Panel de administracion</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('admin/articles') }}">
                       Inicio
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        @guest
                        <li>
                            <a href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Registrarse</a>
                        </li>
                        @else
                        <li><a href="{{ url('admin/articles') }}">Articulos</a></li>
                        <li><a href="{{ url('admin/images') }}">Imágenes</a></li>
                        @if(Auth::user()->admin()==true)
                        <li><a href="{{ url('admin/categories') }}">Categorias</a></li>
                        <li><a href="{{ url('admin/users') }}">Usuarios </a></li>
                        <li><a href="{{ url('admin/tags') }}">Tag</a></li>
                        @endif


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <section>

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">@yield('title','default')</div>
                            <div class="panel-body table-responsive ">
                                @include('flash::message') @include('admin.templates.partials.errors') @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.templates.partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('plugins/jquery/js/jquery-2.1.4.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugins/Trumbowyg/trumbowyg.js') }}"></script>
    <script src="{{ asset('plugins/kartik-file/js/fileinput.min.js') }}"></script>
    @yield('js')
</body>

</html>