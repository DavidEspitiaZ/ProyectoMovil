
@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}"><button class="btn btn-primary">VOLVER</button></a>
    <a href="{{ route('products.PDF') }}" ><button class="btn btn-primary">PDF</button></a>
    <a href="{{ route('products.Excel') }}" ><button class="btn btn-primary">Excel</button></a>

    <h1>Lista de productos</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Categoria</th>
            <th scope="col">Funciones</th>

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
            <td>
                <!-- Formulario para Eliminar Producto -->
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger">ELIMINAR</button>
                </form>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">EDITAR</a>
              </td>
              <td>
                <img src="{{ asset($product->image_url) }}" alt="Producto {{ $product->name_product }}">
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h1>Crear producto</h1>
      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name_product">Nombre:</label>
            <input type="text" name="name_product" required class="form-control">
        </div>
        <div>
          <label for="product_image">Imagen:</label>
          <input type="file" name="image" accept="image/*" class="form-control">
        </div>
        <div>
          <label for="description_product">Descripcion:</label>
          <input type="text" name="description_product" required class="form-control">
      </div>
        <div>
            <label for="price_product">precio:</label>
            <input type="number" name="price_product" required class="form-control">
        </div>
        <div>
            <label for="stock_product">cantidad:</label>
            <input type="number" name="stock_product" class="form-control">
        </div>
        <div>
          <label for="category">Categoría:</label>
          <select name="id_category" class="form-control">
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name_category }}</option>
            @endforeach
    </select>
        </div>
        <!-- Otros campos según tus necesidades -->
        <button type="submit" class="btn btn-primary m-9">Crear producto</button>
    </form>
@endsection 