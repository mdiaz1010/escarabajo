@extends('layouts.app') @section('title','Editar Categoria') @section('content')

    {!! Form::open(['route'=>['categories.update',$categories],'method'=>'PUT']) !!}


        <div class='form-group'>
            {!! Form::label('name','Nombre') !!}
            {!! Form::hidden('id',$categories->id,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
            {!! Form::text('name',$categories->name,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
        </div>

        <div class='form-group'>
            {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@endsection