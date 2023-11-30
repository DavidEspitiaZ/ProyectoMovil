<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;

class OrderWebController extends Controller
{
    public function index()
    {
        $orders = order::all();
        return view('orders.index', compact('orders'));
    }

    public function generarPDF()
    {
        $orders = order::all();
        $pdf = PDF::loadView('orders.PDF', compact('orders'));
        return $pdf->stream('ordenes.pdf');
    }

    public function generarExcel()
    {
        return Excel::download(new OrdersExport, 'ordenes.xlsx');
    }
}
