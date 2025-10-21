<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        // Use same page size as empleados so paginator appears for similar record counts
        $departamentos = \App\Models\Departamento::paginate(5);
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_corto' => 'nullable|string|max:50',
            'telefono' => 'nullable|string',
        ]);

        \App\Models\Departamento::create($validated);
        return redirect()->route('departamentos.index')->with('success', 'Departamento creado.');
    }

    public function show($id)
    {
        $departamento = \App\Models\Departamento::findOrFail($id);
        return view('departamentos.show', compact('departamento'));
    }

    public function edit($id)
    {
        $departamento = \App\Models\Departamento::findOrFail($id);
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_corto' => 'nullable|string|max:50',
            'telefono' => 'nullable|string',
        ]);

        $departamento = \App\Models\Departamento::findOrFail($id);
        $departamento->update($validated);

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado.');
    }

    public function destroy($id)
    {
        $departamento = \App\Models\Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado.');
    }
}
