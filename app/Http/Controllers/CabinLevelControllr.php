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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CabinLevel $cabinLevel)
    {
        //
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
