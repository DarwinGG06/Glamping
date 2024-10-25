<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use Illuminate\Http\Request;
use App\Http\Resources\CabinResource;
use App\Http\Resources\CabinCollection;
use App\Http\Requests\CabinStoreRequest;

class CabinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Get de todas las cabañas
        //return "Hola Mundo";
        $sort = $request->input('sort', 'name');
        $type = $request->input('type', 'asc');


        $validSort = ["name", "cabinlevel_id", "capacity"];
        $validType = ["asc","desc"];

        if(!in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";

            return response()->json(['error' => $message], 400);
        }

        if(!in_array($type, $validType)) {
            $message = "Invalid type field: $type";

            return response()->json(['error' => $message], 400);
        }

        $cabin = Cabin::orderBy($sort, $type)->get();

        return response()->
            json([new CabinCollection($cabin)], 200);

            //            json(['data' => CabinResource::collection($cabin)], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CabinStoreRequest $request)
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
            json(['data' => new CabinResource($cabin)], 200);
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
