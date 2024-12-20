<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json(['data' => $users], 200);
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
        $user = User::create($request->all());

        return response()->
            json(['data' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //Ver cabaña n
        return response()->
        json(['data' => $user], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //actualizar cabaña
        $user->update($request->all());

        return response()->
            json(['data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // borrar cabaña
        $user->delete();

        return response()->
            json(null, 204);
    }
}
