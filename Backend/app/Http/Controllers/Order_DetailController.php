<?php

namespace App\Http\Controllers;
use App\Models\order_detail;
use Illuminate\Http\Request;

class Order_DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_details = order_detail::all();
        return $order_details;
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
        $order_detail = new order_detail();
        $order_detail->quanty=$request->quanty;
        $order_detail->unit_price=$request->unit_price;
        $order_detail->id_order=$request->id_order;
        $order_detail->id_product=$request->id_product;
        $order_detail->save();

        return $order_detail;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_detail = order_detail::find($id);
        return $order_detail;
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
        $order_detail = order_detail::find($id);
        $order_detail->quanty=$request->quanty;
        $order_detail->unit_price=$request->unit_price;
        $order_detail->id_order=$request->id_order;
        $order_detail->id_product=$request->id_product;
        $order_detail->save();

        return $order_detail;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_detail = order_detail::find($id);
        $order_detail -> delete();

        return 'Se ha eliminado';
    }
}
