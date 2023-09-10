<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Municipality;


class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Lista todas as provincias
        $municipalities = Municipality::all();
        return response()->json($municipalities, 200);
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
            'descricao' => 'required|unique:municipalities|max:255',
        ]);

        $municipality = Municipality::create($validatedData);
        return response()->json($municipality, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Exibir detalhes de uma provincia especifica
        $municipality = Municipality::find($id);

        if (!$municipality) {
            return response()->json(['message' => 'Provincia nao encontrada'], 404);
        }

        return response()->json($municipality, 200);
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
            'descricao' => 'required|unique:municipalities|max:255',
        ]);
    
        $municipality = Municipality::find($id);
    
        if (!$municipality) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }
    
        $municipality->update($validatedData);
        return response()->json($municipality, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $municipality = Municipality::find($id);

        if (!$municipality) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }
    
        $municipality->delete();
        return response()->json(['message' => 'Província excluída com sucesso'], 200);
    }
}
