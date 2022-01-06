@extends('layout.layout')

@section('content-categories')
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
      <h4>Registrar Categoría</h4>
    </div>
    <div class="card-body">
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de Categoría</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="">
                @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-success">Guardar</button>
            <a href="{{route('category.index')}}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
  </div>
@endsection