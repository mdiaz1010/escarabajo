@extends('layouts.app') @section('title','Listar Usuarios') @section('content')


<a href="{{ route('users.create') }}" class="btn btn-info">Registrar nuevo Usuario</a>
<hr>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key =>$user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->type=='admin')
                <span class="label label-danger">{{$user->type}}</span>
                @else
                <span class="label label-primary">{{$user->type}}</span>
                @endif
            </td>
            <td>
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                </a>
                <a href="{{ route('users.destroy',$user->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    {!! $users->render() !!}
</div>


@endsection