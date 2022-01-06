@extends('layout.layout')

@section('content')
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
      <h4>Registrar Producto</h4>
    </div>
    <div class="card-body">
        <form action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="">
                @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="quantity " class="form-label">Cantidad</label>
                <input type="number" name="quantity" class="form-control" id="quantity " placeholder="">
                @error('quantity')
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categoría</label>
                <select id="category" name="category" class="form-select">
                    <option value="">-Seleccione-</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-success">Guardar</button>
            <a href="{{route('product.index')}}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
  </div>
@endsection