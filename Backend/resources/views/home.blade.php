@extends('layouts.app')

@section('content')

<style>
    .card{
        display: inline-block;
    }
</style>

<link rel="stylesheet" href="">

<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">USUARIOS</h5>
      <p class="card-text">Visualizar, añadir, eliminar o modificar un Usuario</p>
      <a href="{{ route('users.index') }}" class="btn btn-primary">Ver</a>
    </div>
  </div>

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">CATEGORIAS</h5>
      <p class="card-text">Visualizar, añadir, eliminar o modificar una categoria</p>
      <a href="{{ route('category.index') }}" class="btn btn-primary">Ver</a>
    </div>
  </div>

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">PRODUCTOS</h5>
      <p class="card-text">Visualizar, añadir, eliminar o modificar un producto</p>
      <a href="{{ route('products.index') }}" class="btn btn-primary">Ver</a>
    </div>
  </div>

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">ORDENES</h5>
      <p class="card-text">Visualizar, añadir, eliminar o modificar una orden</p>
      <a href="{{ route('order.index') }}" class="btn btn-primary">Ver</a>
    </div>
  </div>

@endsection