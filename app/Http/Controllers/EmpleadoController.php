<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = \App\Models\Empleado::paginate(5);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'RFC' => 'required|string|size:13|unique:empleados,RFC',
            'nombre' => 'required|string|max:100',
            'apellido_pat' => 'nullable|string|max:100',
            'apellido_mat' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string',
        ]);

        \App\Models\Empleado::create($validated);

        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empleado = \App\Models\Empleado::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = \App\Models\Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'RFC' => 'required|string|size:13|unique:empleados,RFC,'.$id,
            'nombre' => 'required|string|max:100',
            'apellido_pat' => 'nullable|string|max:100',
            'apellido_mat' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string',
        ]);

        $empleado = \App\Models\Empleado::findOrFail($id);
        $empleado->update($validated);

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = \App\Models\Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
