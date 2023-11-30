<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Categorias</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name_category }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection 