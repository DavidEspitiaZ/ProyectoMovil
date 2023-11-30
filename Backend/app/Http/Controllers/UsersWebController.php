<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use App\Models\role;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Maatwebsite\Excel\Facades\Excel;

class UsersWebController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function generarPDF()
    {
        $users = User::all();
        $pdf = PDF::loadView('users.PDF', compact('users'));
        return $pdf->stream('usuarios.pdf');
    }

    public function generarExcel()
    {
        return Excel::download(new UsersExport, 'usuarios.xlsx');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Usuario eliminado correctamente.');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user -> name = $request -> name;
        $user -> lastName = $request -> lastName;
        $user -> email = $request -> email;
        $user -> address = $request -> address;
        $user -> id_role = 1;
        $user -> password = bcrypt($request -> password);
        $user -> save();
        return redirect()->route('users.index')->with('status', 'Usuario creado correctamente.');
    }
    
}
