@extends('layouts.layout')

@section('title', 'Editar Empleado')

@section('content')
    <h1 class="text-center">Editar Empleado</h1>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary mb-3">Volver a la lista</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empleados.update',  $empleado) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombres" class="form-control" value="{{ $empleado->nombres }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Apellido:</label>
            <input type="text" name="apellidos" class="form-control" value="{{ $empleado->apellidos }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Puesto:</label>
            <input type="text" name="puesto" class="form-control" value="{{ $empleado->puesto }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Contratación:</label>
            <input type="date" name="fecha_contratacion" class="form-control" value="{{ $empleado->fecha_contratacion }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Salario:</label>
            <input type="number" name="salario" class="form-control" step="0.01" value="{{ $empleado->salario }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo Electrónico:</label>
            <input type="email" name="email" class="form-control" value="{{ $empleado->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ $empleado->telefono }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Departamento:</label>
            <input type="text" name="departamento" class="form-control" value="{{ $empleado->departamento }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection
