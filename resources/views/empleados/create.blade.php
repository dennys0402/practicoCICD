@extends('layouts.layout')

@section('title', 'Crear Empleado')

@section('content')
    <h1 class="text-center">Nuevo Empleado</h1>
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

    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombres" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Apellido:</label>
            <input type="text" name="apellidos" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Puesto:</label>
            <input type="text" name="puesto" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Contratación:</label>
            <input type="date" name="fecha_contratacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Salario:</label>
            <input type="number" name="salario" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo Electrónico:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Departamento:</label>
            <input type="text" name="departamento" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
