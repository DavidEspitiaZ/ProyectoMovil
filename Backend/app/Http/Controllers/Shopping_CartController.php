<?php

namespace App\Http\Controllers;
use App\Models\shopping_cart;
use Illuminate\Http\Request;

class Shopping_CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shopping_carts = shopping_cart::all();
        return $shopping_carts;
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
        $shopping_cart = new shopping_cart();
        $shopping_cart->state_shopping_cart=$request->state_shopping_cart;
        $shopping_cart->create_shopping_cart=$request->create_shopping_cart;
        $shopping_cart->id_profile=$request->id_profile;
        $shopping_cart->save();

        return $shopping_cart;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shopping_cart = shopping_cart::find($id);
        return $shopping_cart;
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
        $shopping_cart = shopping_cart::find($id);
        $shopping_cart->state_shopping_cart=$request->state_shopping_cart;
        $shopping_cart->create_shopping_cart=$request->create_shopping_cart;
        $shopping_cart->id_profile=$request->id_profile;
        $shopping_cart->save();

        return $shopping_cart;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shopping_cart = shopping_cart::find($id);
        $shopping_cart -> delete();

        return 'Se ha eliminado';
    }
}
