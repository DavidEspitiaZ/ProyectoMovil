<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}" ><button class="btn btn-primary">VOLVER</button></a>
    <a href="{{ route('users.PDF') }}" ><button class="btn btn-primary">PDF</button></a>
    <a href="{{ route('users.Excel') }}" ><button class="btn btn-primary">Excel</button></a>
    
    
    <h1>Lista de Usuarios</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Funciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address }}</td>
            <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <a href="{{ route('users.store') }}"><button class="btn btn-secondary">Modificar</button></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


    <h1>Crear Usuario</h1>
    <form action="{{ route('users.store') }}" method="POST">
      @csrf
      <div>
          <label for="name">Nombre:</label>
          <input type="text" name="name" required class="form-control">
      </div>
      <div>
        <label for="lastName">Apellido:</label>
        <input type="text" name="lastName" required class="form-control">
    </div>
      <div>
          <label for="email">Email:</label>
          <input type="email" name="email" required class="form-control">
      </div>
      <div>
          <label for="address">Dirección:</label>
          <input type="text" name="address" class="form-control">
      </div>
      <div>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" class="form-control">
    </div>
      <!-- Otros campos según tus necesidades -->
      <button type="submit" class="btn btn-primary">Crear Usuario</button>
  </form>

@endsection 