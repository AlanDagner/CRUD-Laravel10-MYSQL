@extends('layout/template')

@section('title', 'Registrar')

@section('contenido')

    <main>
        <div class="container py-4">
            <h2>Registar Alumno</h2>

            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ url('alumnos') }}" method="post">

                @csrf

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label">Código:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="codigo" id="codigo" value="{{ old('codigo') }}"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha de nacimiento:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="telefono" id="telefono"
                            value="{{ old('telefono') }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="ciclo" class="col-sm-2 col-form-label">Ciclo:</label>
                    <div class="col-sm-5">
                        <select name="ciclo" id="ciclo" class="form-select" required>
                            <option value="">Seleccionar ciclo</option>
                            @foreach ($ciclos as $ciclo)
                                <option value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <a href="{{ url('alumnos') }}" class="btn btn-danger">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>

            </form>
        </div>
    </main>
