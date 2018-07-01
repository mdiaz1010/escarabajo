@extends('layouts.app') @section('title','Lista de articulos') @section('content')
<a href="{{ route('articles.create') }}" class="btn btn-info">Registrar nuevo artículo</a><hr>
<!-- Buscador de tags -->
{!! Form::open(['route'=>'articles.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
    <div class='input-group'>
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar Artículo..','aria-describedby'=>'search']) !!}
        <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search"  aria-hidden="true"></span></span>
    </div>
{!! Form::close() !!}
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Título</th>
            <th scope="col">Categoria</th>
            <th scope="col">Usuario</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $key =>$article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->category->name}}</td>
            <td>{{$article->user->name}}</td>
            <td>
                <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                </a>
                <a href="{{ route('articles.destroy',$article->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    {!! $articles->render() !!}
</div>

@endsection