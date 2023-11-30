<?php

namespace App\Http\Controllers;
use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = role::all();
        return $roles;
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
        $role = new role();
        $role->role_detail=$request->role_detail;
        $role->save();

        return $role;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = role::find($id);
        return $role;
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
        $role = role::find($id);
        $role->role_detail=$request->role_detail;
        $role->save();

        return $role;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = role::find($id);
        $role -> delete();

        return 'Se ha eliminado';
    }
}
