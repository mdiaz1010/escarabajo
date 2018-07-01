@extends('layouts.app')
@section('title','Crear Tags')
@section('content')

    {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}

    <div class='form-group'>
        {!! Form::label('name','Nombre') !!} {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required'])
        !!}
    </div>


    <div class='form-group'>
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection