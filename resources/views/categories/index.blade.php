@extends('layout.layout')

@section('content')
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
      Categorias
      <div class="text-end"> <button class="btn btn-primary text-end">Nueva Categoría</button></div>
     
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha Creación</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <button class="btn btn-success">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$categories->links()}}
    </div>
  </div>
    
@endsection