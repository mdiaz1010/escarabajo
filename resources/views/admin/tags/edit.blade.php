@extends('layouts.app') @section('title','Editar Tag') @section('content')

    {!! Form::open(['route'=>['tags.update',$tags],'method'=>'PUT']) !!}


        <div class='form-group'>
            {!! Form::label('name','Nombre') !!}
            {!! Form::hidden('id',$tags->id,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
            {!! Form::text('name',$tags->name,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
        </div>

        <div class='form-group'>
            {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@endsection