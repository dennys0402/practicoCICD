@extends('layouts.layout')

@section('title', 'Lista de Empleados')

@section('content')
    <h1 class="text-center">Lista de Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Nuevo Empleado</a>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="table-info">
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->nombres }} {{ $empleado->apellidos }}</td>
                    <td>{{ $empleado->puesto }}</td>
                    <td>${{ number_format($empleado->salario, 2) }}</td>
                    <td>
                        <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
