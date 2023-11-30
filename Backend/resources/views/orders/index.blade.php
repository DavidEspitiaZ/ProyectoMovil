
@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}"><button class="btn btn-primary">VOLVER</button></a>
    <a href="{{ route('orders.PDF') }}" ><button class="btn btn-primary">PDF</button></a>
    <a href="{{ route('orders.Excel') }}" ><button class="btn btn-primary">Excel</button></a>

    <h1>Lista de Ordenes</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Fecha de la orden</th>
            <th scope="col">Precio Total</th>
            <th scope="col">Estado de la Orden</th>
            <th scope="col">ID de Usuario</th>
            <th scope="col">Funciones</th>

          </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
          <tr>
            <th scope="row">{{ $order->id }}</th>
            <td>{{ $order->order_date }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->state_order }}</td>
            <td>{{ $order->id_user }}</td>
            <td>
                <!-- Formulario para Eliminar Producto -->
                <form action="{{ route('orders.destroy', $product->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger">ELIMINAR</button>
                </form>
              <button class="btn btn-secondary">EDITAR</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h1>Crear producto</h1>
      <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name_product">Nombre:</label>
            <input type="text" name="name_product" required class="form-control">
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
          <label for="id_category">categoria:</label>
          <input type="number" name="id_category" class="form-control">
      </div>
        <!-- Otros campos según tus necesidades -->
        <button type="submit" class="btn btn-primary m-9">Crear producto</button>
    </form>
@endsection 