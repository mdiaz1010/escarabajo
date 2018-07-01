<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','default')| Panel de administracion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" />

</head>
<body>
    @include('admin.templates.partials.nav')
    <section>
        @include('flash::message')
        @include('admin.templates.partials.errors')
        @yield('content')
    </section>
    @include('admin.templates.partials.footer')
    <script src="{{ asset('plugins/jquery/js/jquery-2.1.4.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
</body>

</html>