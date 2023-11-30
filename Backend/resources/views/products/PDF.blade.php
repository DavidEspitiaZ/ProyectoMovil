<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Productos</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Categoria</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name_product }}</td>
            <td>{{ $product->description_product }}</td>
            <td>{{ $product->price_product }}</td>
            <td>{{ $product->stock_product }}</td>
            <td>{{ $product->id_category }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection 