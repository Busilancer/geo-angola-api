<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;


class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Lista todas as provincias
        $province = Province::all();
        return response()->json($province, 200);
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
            'descricao' => 'required|unique:provinces|max:255',
        ]);

        $province = Province::create($validatedData);
        return response()->json($province, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Exibir detalhes de uma provincia especifica
        $province = Province::find($id);

        if (!$province) {
            return response()->json(['message' => 'Provincia nao encontrada'], 404);
        }

        return response()->json($province, 200);
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
            'descricao' => 'required|unique:provinces|max:255',
        ]);
    
        $province = Province::find($id);
    
        if (!$province) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }
    
        $province->update($validatedData);
        return response()->json($province, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $province = Province::find($id);

        if (!$province) {
            return response()->json(['message' => 'Província não encontrada'], 404);
        }
    
        $province->delete();
        return response()->json(['message' => 'Província excluída com sucesso'], 200);
    }
}
