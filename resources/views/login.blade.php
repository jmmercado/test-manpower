@extends('layout.layout')

@section('content')
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
      <h4>Iniciar Sesión</h4>
    </div>
    <div class="card-body">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button class="btn btn-primary">Ingresar</button>
        </form>
    </div>
  </div>
@endsection


