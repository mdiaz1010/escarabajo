@extends('layouts.app') @section('title','Lista de categorias') @section('content')
<a href="{{ route('categories.create') }}" class="btn btn-info">Registrar nueva categoria</a><hr>
<table class="table table-dark ">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $key =>$categorie)
        <tr>
            <td>{{$categorie->id}}</td>
            <td>{{$categorie->name}}</td>
            <td>
                <a href="{{ route('categories.edit',$categorie->id) }}" class="btn btn-warning" ><span  class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                <a href="{{ route('categories.destroy',$categorie->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
{!! $categories->render() !!}
</div>
@endsection