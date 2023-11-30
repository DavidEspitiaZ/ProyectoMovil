<?php

namespace App\Http\Controllers;
use App\Models\payment_method;
use Illuminate\Http\Request;

class Payment_MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_methods = payment_method::all();
        return $payment_methods;
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
        $payment_method = new payment_method();
        $payment_method->id_profile=$request->id_profile;
        $payment_method->id_detail_payment=$request->id_detail_payment;
        $payment_method->save();

        return $payment_method;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment_method = payment_method::find($id);
        return $payment_method;
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
        $payment_method = payment_method::find($id);
        $payment_method->id_profile=$request->id_profile;
        $payment_method->id_detail_payment=$request->id_detail_payment;
        $payment_method->save();
        return $payment_method;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment_method = payment_method::find($id);
        $payment_method -> delete();

        return 'Se ha eliminado';
    }
}
