@extends('layout.layout')

@section('content')
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
        <h4>Productos</h4>
        <div class="text-end">
          <a href="{{route('product.create')}}" class="btn btn-primary text-end">Nuevo Producto</a>
        </div>
     
    </div>
    @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>Exelente!</strong> {{session('msg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Usuario Creacion</th>
                <th scope="col">Fecha Creación</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category}}</td>
                    <td>{{$item->user}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{route('product.edit', $item->id)}}" class="btn btn-success">Editar</a>
                            <form action="{{route('product.delete', $item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="alert('Esta seguro que deseas elimenar el registro')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$products->links()}}
    </div>
  </div>
    
@endsection