<?php

namespace App\Http\Controllers;

use App\Models\CabinLevel;
use Illuminate\Http\Request;

class CabinLevelControllr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get de todos los niveles de cabaña
        $cabinLevel = CabinLevel::orderBy('name', 'asc')->get();

        return response()->
            json(['data' => $cabinLevel], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //crear nivel de cabaña
        $cabinLevel = CabinLevel::create($request->all());

        return response()->
            json(['data' => $cabinLevel], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CabinLevel $cabinLevel)
    {
        //Ver nivel de cabaña n
        return response()->
            json(['data' => $cabinLevel], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CabinLevel $cabinLevel)
    {
        //actualizar nivel de cabaña
        $cabinLevel->update($request->all());

        return response()->
            json(['data' => $cabinLevel], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CabinLevel $cabinLevel)
    {
        // borrar nivel de cabaña
        $cabinLevel->delete();

        return response()->
            json(null, 204);
    }
}
