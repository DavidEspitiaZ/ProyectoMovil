<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}" ><button class="btn btn-primary">VOLVER</button></a>
    <a href="{{ route('categories.PDF') }}" ><button class="btn btn-primary">PDF</button></a>
    <a href="{{ route('categories.Excel') }}" ><button class="btn btn-primary">Excel</button></a>

    <h1>Lista de Categorias</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Funciones</th>

          </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name_category }}</td>
            <td>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <button class="btn btn-secondary">Modificar</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    <h1>Crear categoria</h1>
    <form action="{{ route('category.store') }}" method="POST">
      @csrf
      <div>
          <label for="name_category">Nombre categoria:</label>
          <input type="text" name="name_category" required class="form-control"> 
      </div>
      <button type="submit" class="btn btn-primary">Crear categoria</button>
  </form>
@endsection 