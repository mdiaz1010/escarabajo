@extends('layouts.app') @section('title','Editar Articulos') @section('content')
    {!! Form::open(['route'=>['articles.update',$article],'method'=>'PUT','files'=>true]) !!}

    <div class='form-group'>
        {!! Form::label('name','Titulo') !!}
        {!! Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'Titulo del articulo','required']) !!}
    </div>

    <div class='form-group'>
        {!! Form::label('category_id','Tipo') !!}
        {!! Form::select('category_id',$category,$article->category->id,['class'=>'form-control select-category'])!!}
    </div>

    <div class='form-group'>
        {!! Form::label('content','Contenido') !!}
        {!! Form::textarea('content',$article->content,['class'=>'form-control textarea-content'])!!}
    </div>

    <div class='form-group'>
        {!! Form::label('tags','Tags') !!}
        {!! Form::select('tags[]',$tag,$my_tag,['class'=>'form-control select-tag','multiple','required'])!!}
    </div>
<!--
    <div class='form-group'>
        {!! Form::label('image','Imagen') !!}
        {!! Form::file('image',['class'=>'file','readonly'=>false,'required'])!!}
    </div>
-->
    <div class='form-group'>
        {!! Form::submit('Editar articulo',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}
@endsection
@section('js')
<script src="{{ asset('js/js_vistas/articles.js') }}"></script>
@endsection