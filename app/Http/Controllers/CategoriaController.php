<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = \App\Models\Categoria::paginate(5);
    return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Create new categoria
        $categoria = \App\Models\Categoria::create($validated);

        // Redirect to index with success message
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $categoria = \App\Models\Categoria::findOrFail($id);
    return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $categoria = \App\Models\Categoria::findOrFail($id);
    return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate input
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Find and update categoria
        $categoria = \App\Models\Categoria::findOrFail($id);
        $categoria->update($validated);

        // Redirect to index with success message
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $categoria = \App\Models\Categoria::findOrFail($id);
    $categoria->delete();
    return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
