<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Neighborhood;


class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Lista todas as provincias
        $neighborhoods = Neighborhood::all();
        return response()->json($neighborhoods, 200);
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
        $validatedData = $request->validade([
            'descricao' => 'required|unique:neighborhoods|max:255',
        ]);

        $neighborhood = Neighborhood::create($validatedData);
        return response()->json($neighborhood, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Exibir detalhes de uma provincia especifica
        $neighborhood = Neighborhood::find($id);

        if (!$neighborhood) {
            return response()->json(['message' => 'Provincia nao encontrada'], 404);
        }

        return response()->json($neighborhood, 200);
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
        $validatedData = $request->validate([
            'descricao' => 'required|unique:neighborhoods|max:255',
        ]);
    
        $neighborhood = Neighborhood::find($id);
    
        if (!$neighborhood) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }
    
        $neighborhood->update($validatedData);
        return response()->json($neighborhood, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $neighborhood = Neighborhood::find($id);

        if (!$neighborhood) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }
    
        $neighborhood->delete();
        return response()->json(['message' => 'Província excluída com sucesso'], 200);
    }
}
