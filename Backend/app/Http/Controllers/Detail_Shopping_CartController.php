<?php

namespace App\Http\Controllers;
use App\Models\detail_shopping_cart;
use Illuminate\Http\Request;

class Detail_Shopping_CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_shopping_carts = detail_shopping_cart::all();
        return $detail_shopping_carts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detail_shopping_cart = new detail_shopping_cart();
        $detail_shopping_cart->quanty=$request->quanty;
        $detail_shopping_cart->unit_price=$request->unit_price;
        $detail_shopping_cart->id_product=$request->id_product;
        $detail_shopping_cart->id_shopping_cart=$request->id_shopping_cart;
        $detail_shopping_cart->save();

        return $detail_shopping_cart;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail_shopping_cart = detail_shopping_cart::find($id);
        return $detail_shopping_cart;
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
        $detail_shopping_cart = detail_shopping_cart::find($id);
        $detail_shopping_cart->quanty=$request->quanty;
        $detail_shopping_cart->unit_price=$request->unit_price;
        $detail_shopping_cart->id_product=$request->id_product;
        $detail_shopping_cart->id_shopping_cart=$request->id_shopping_cart;
        $detail_shopping_cart->save();

        return $detail_shopping_cart;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail_shopping_cart = detail_shopping_cart::find($id);
        $detail_shopping_cart -> delete();

        return 'Se ha eliminado';
    }
}
