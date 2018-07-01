@extends('layouts.app') @section('title','Crear Articulos') @section('content')
    {!! Form::open(['route'=>'articles.store','method'=>'POST','files'=>true]) !!}

    <div class='form-group'>
        {!! Form::label('name','Titulo') !!}
        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del articulo','required']) !!}
    </div>

    <div class='form-group'>
        {!! Form::label('category_id','Tipo') !!}
        {!! Form::select('category_id',$categories,null,['class'=>'form-control select-category'])!!}
    </div>

    <div class='form-group'>
        {!! Form::label('content','Contenido') !!}
        {!! Form::textarea('content',null,['class'=>'form-control textarea-content'])!!}
    </div>

    <div class='form-group'>
        {!! Form::label('tags','Tags') !!}
        {!! Form::select('tags[]',$tags,null,['class'=>'form-control select-tag','multiple','required'])!!}
    </div>

    <div class='form-group'>
        {!! Form::label('image','Imagen') !!}
        {!! Form::file('image',['class'=>'file','readonly'=>false,'required'])!!}
    </div>

    <div class='form-group'>
        {!! Form::submit('Agregar articulo',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}
@endsection
@section('js')
<script src="{{ asset('js/js_vistas/articles.js') }}"></script>
@endsection