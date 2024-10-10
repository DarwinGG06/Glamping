<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "buenas a todos";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //crear cabaña
        $service = Service::create($request->all());

        return response()->
            json(['data' => $service], 201);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // borrar servicio
        $service->delete();

        return response()->
            json(null, 204);
    }
}
