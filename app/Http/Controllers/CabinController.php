<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabinStoreRequest;
use App\Http\Resources\CabinCollection;
use App\Http\Resources\CabinResource;
use App\Models\Cabin;
use Illuminate\Http\Request;

class CabinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Get de todas las cabaña
        //return "Hola Mundo";

        $sort = $request->input('sort', 'name');//campo por el que se ordena
        $type = $request->input('type', 'asc');//tipo de orden

        $validType = ['asc', 'desc'];//tipos de orden validos

        if (! in_array($type, $validType, true)) {//si el tipo de orden no es valido
            $message = "Invalid sort type: $type";//mensaje de error

            return response()->//devolver mensaje de error
                json(['data' => $message], 400);//codigo de error 400
        }

        $validSort = ['name', 'cabinlevel_id', 'capacity'];//campos por los que se puede ordenar

        if (! in_array($sort, $validSort, true)) {//si el campo por el que se ordena no es valido
            $message = "Invalid sort field: $sort";//mensaje de error

            return response()->
                json(['data' => $message], 400);
        }

        $cabins = Cabin::orderBy($sort, $type)->get();//obtener cabañas ordenadas

        return response()->//devolver cabañas
            //json(['data' => CabinResource::collection($cabins)], 200);//codigo 200
            json([new CabinCollection($cabins)], 200);//codigo 200
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
        //Ver cabaña n
        return response()->
            json(['data' => new CabinResource($cabin)],
                200);
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

    public function addServices(Request $request, $id)
    {
        // Encuentra la cabaña por su ID o lanza un error 404
        $cabin = Cabin::findOrFail($id);

        // Valida que se envíen servicios y que cada uno exista en la tabla 'services'
        $validated = $request->validate([
            'services' => 'required|array',        // Debe ser un array y obligatorio
            'services.*' => 'exists:services,id', // Cada ID debe existir en 'services'
        ]);

        // Sincroniza los servicios con la cabaña
        $cabin->services()->sync($validated['services']);

        // Retorna una respuesta JSON con el mensaje y los servicios asignados
        return response()->json([
            'message' => 'Servicios asignados correctamente.',
            'data' => [
                'cabin' => $cabin,
                'services' => $cabin->services, // Incluye los servicios relacionados
            ]],200);
    }

    public function addUsers(Request $request, $id)
{
    // Encuentra la cabaña por su ID o lanza un error 404
    $cabin = Cabin::findOrFail($id);

    // Valida que se envíen usuarios y que cada uno exista en la tabla 'users'
    $validated = $request->validate([
        'users' => 'required|array',        // Debe ser un array y obligatorio
        'users.*' => 'exists:users,id',    // Cada ID debe existir en la tabla 'users'
    ]);

    // Sincroniza los usuarios con la cabina (remplaza relaciones existentes)
    $cabin->users()->sync($validated['users']);

    // Recarga los usuarios relacionados para asegurar la respuesta actualizada
    $cabin->load('users');

    // Retorna una respuesta JSON con el mensaje y los usuarios asignados
    return response()->json([
        'message' => 'Los usuarios han sido reservados correctamente para la cabaña.',
        'data' => [
            'cabin_id' => $cabin->id,
            'users' => $cabin->users, // Incluye los usuarios relacionados
        ]
    ], 200);
}

}
