@extends('layouts.app')
@section('title','Crear Usuario')
@section('content')

    {!! Form::open(['route'=>'users.store','method'=>'POST']) !!}

    <div class='form-group'>
        {!! Form::label('name','Nombre') !!} {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required'])
        !!}
    </div>

    <div class='form-group'>
        {!! Form::label('email','Correo electronico') !!} {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com','required'])
        !!}
    </div>

    <div class='form-group'>
        {!! Form::label('password','contraseña') !!} {!! Form::password('password',['class'=>'form-control','placeholder'=>'********','required'])
        !!}
    </div>

    <div class='form-group'>
        {!! Form::label('type','Tipo') !!} {!! Form::select('type',[''=>'Seleccione un nivel...','member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control'])
        !!}
    </div>

    <div class='form-group'>
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection