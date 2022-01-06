@extends('layout.layout')

@section('content')
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
      <h4>Editar Categoría {{$category->name}}</h4>
    </div>
    <div class="card-body">
        <form action="{{route('categorie.update', $category->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de Categoría</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
                @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-success">Actualizar</button>
            <a href="{{route('categorie.index')}}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
  </div>
@endsection