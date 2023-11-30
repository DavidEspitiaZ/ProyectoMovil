<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\category;

class ProductWebController extends Controller
{
    public function index()
    {
        $products = product::all();
        $categories = category::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function generarPDF()
    {
        $products = product::all();
        $pdf = PDF::loadView('products.PDF', compact('products'));
        return $pdf->stream('productos.pdf');
    }

    public function generarExcel()
    {
        return Excel::download(new ProductsExport, 'productos.xlsx');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('status', 'Producto eliminado correctamente.');
    }

    public function store(Request $request)
    {
        $product = new product();
        $product->name_product=$request->name_product;
        $product->description_product=$request->description_product;
        $product->price_product=$request->price_product;
        $product->stock_product=$request->stock_product;
        $product->id_category=$request->id_category;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath ='imagenes/producto/';
            $fileName = $file->getClientOriginalName();
            $uploadSuccess = $request->file('image')->move($destinationPath, $fileName);
            $product->image_url = $destinationPath . $fileName;
        }

        $product->save();

        return redirect()->route('products.index')->with('status', 'Producto creado correctamente.');
    }

    public function update(Request $request, string $id)
    {
        $product = product::find($id);
        $product->name_product=$request->name_product;
        $product->description_product=$request->description_product;
        $product->price_product=$request->price_product;
        $product->stock_product=$request->stock_product;
        $product->id_category=$request->id_category;
        $product->save();

        return $product;
    }
}
