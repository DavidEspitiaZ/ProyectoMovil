<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\role;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
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
        $user = new User();
        $user -> name = $request -> name;
        $user -> lastName = $request -> lastName;
        $user -> email = $request -> email;
        $user -> address = $request -> address;
        $user -> id_role = 2;
        $user -> password = bcrypt($request -> password);
        $user -> save();
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user -> name = $request -> name;
        $user -> lastName = $request -> lastName;
        $user -> email = $request -> email;
        $user -> address = $request -> address;
        $user -> password = bcrypt($request -> password);
        $user -> save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user -> delete();
        $user -> save();
        return 'Se borro exitosamente';
    }
}
