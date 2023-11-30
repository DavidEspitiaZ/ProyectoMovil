<?php

namespace App\Http\Controllers;
use App\Models\detail_payment;
use Illuminate\Http\Request;

class Detail_PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_payments = detail_payment::all();
        return $detail_payments;
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
        $detail_payment = new detail_payment();
        $detail_payment->name_detail=$request->name_detail;
        $detail_payment->number_detail=$request->number_detail;
        $detail_payment->expiretion_date_detail=$request->expiretion_date_detail;
        $detail_payment->save();
        return $detail_payment;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail_payment = detail_payment::find($id);
        return $detail_payment;
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
        $detail_payment = detail_payment::find($id);
        $detail_payment->name_detail=$request->name_detail;
        $detail_payment->number_detail=$request->number_detail;
        $detail_payment->expiretion_date_detail=$request->expiretion_date_detail;
        $detail_payment->save();
        return $detail_payment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail_payment = detail_payment::find($id);
        $detail_payment -> delete();
        return 'Se ha eliminado';
    }
}
