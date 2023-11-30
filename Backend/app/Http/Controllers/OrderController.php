<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = order::all();
        return $orders;
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
        $order = new order();
        $order->order_date=$request->order_date;
        $order->total_price=$request->total_price;
        $order->state_order=$request->state_order;
        $order->id_user=$request->id_profile;
        $order->id_payment_method=$request->id_payment_method;
        $order->save();

        return $order;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = order::find($id);
        return $order;
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
        $order = order::find($id);
        $order->order_date=$request->order_date;
        $order->total_price=$request->total_price;
        $order->state_order=$request->state_order;
        $order->id_user=$request->id_profile;
        $order->id_payment_method=$request->id_payment_method;
        $order->save();

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = order::find($id);
        $order -> delete();

        return 'Se ha eliminado';
    }
}
