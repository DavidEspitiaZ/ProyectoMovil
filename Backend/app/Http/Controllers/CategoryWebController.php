<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use App\Models\category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;

class CategoryWebController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('categories.index', compact('categories'));
    }

    public function generarPDF()
    {
        $categories = category::all();
        $pdf = PDF::loadView('categories.PDF', compact('categories'));
        return $pdf->stream('categorias.pdf');
    }

    public function generarExcel()
    {
        return Excel::download(new CategoriesExport, 'categorias.xlsx');
    }

    public function destroy(string $id)
    {
        $category = category::find($id);
        $category -> delete();
        return redirect()->route('category.index')->with('status', 'Categoria eliminada correctamente.');
    }


    public function store(Request $request)
    {
        $category = new category();
        $category->name_category = $request->name_category;
        $category->save();
        return redirect()->route('category.index')->with('status', 'Categoria creada correctamente.'); 
    }
}
