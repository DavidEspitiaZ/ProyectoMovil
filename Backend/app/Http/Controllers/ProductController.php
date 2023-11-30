<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return $products;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new product();
        $product->name_product=$request->name_product;
        $product->description_product=$request->description_product;
        $product->price_product=$request->price_product;
        $product->stock_product=$request->stock_product;
        $product->id_category=$request->id_category;
        $product->save();

        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::find($id);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::find($id);
        $product -> delete();

        return 'Se ha eliminado';
    }
}
