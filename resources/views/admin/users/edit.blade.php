@extends('layouts.app') @section('title','Editar Usuario') @section('content')
{!! Form::open(['route'=>['users.update',$users],'method'=>'PUT'])!!}


<div class='form-group'>
    {!! Form::label('name','Nombre') !!} {!! Form::hidden('id',$users->id,['class'=>'form-control','placeholder'=>'Nombre Completo','required'])
    !!} {!! Form::text('name',$users->name,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
</div>

<div class='form-group'>
    {!! Form::label('email','Correo electronico') !!} {!! Form::text('email',$users->email,['class'=>'form-control','placeholder'=>'example@gmail.com','required'])
    !!}
</div>

<div class='form-group'>
    {!! Form::label('type','Tipo') !!} {!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],$users->type,['class'=>'form-control'])
    !!}
</div>

<div class='form-group'>
    {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!} @endsection