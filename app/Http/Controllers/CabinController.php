<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use Illuminate\Http\Request;

class CabinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get de todas las cabañas
        //return "Hola Mundo";
        $cabin = Cabin::orderBy('name', 'asc')->get();

        return response()->
            json(['data' => $cabin], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //crear cabaña
        $cabin = Cabin::create($request->all());

        return response()->
            json(['data' => $cabin], 201);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabin $cabin)
    {
        //Ver cabaña
        return response()->
            json(['data' => $cabin], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabin $cabin)
    {
        //actualizar cabaña
        $cabin->update($request->all());

        return response()->
            json(['data' => $cabin], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabin $cabin)
    {
        // borrar cabaña
        $cabin->delete();

        return response()->
            json(null, 204);
    }
}
