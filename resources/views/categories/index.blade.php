@extends('layout.layout')

@section('content')
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
                <td>@mdo</td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection