<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'salario' => 'required|numeric',
            'email' => 'required|email|unique:empleados,email',
            'telefono' => 'required|string|max:15',
            'departamento' => 'required|string|max:255',
        ]);

        Empleado::create($request->all());
        return redirect('/empleados')->with('success', 'Empleado creado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'salario' => 'required|numeric',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'telefono' => 'required|string|max:15',
            'departamento' => 'required|string|max:255',
        ]);

        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
