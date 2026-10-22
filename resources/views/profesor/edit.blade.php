@extends('template.base')

@section('content')
<form action="{{ route('profesor.update', $profesor) }}" method="post" novalidate>
    @method('put')
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label> 
        <input type="text" value="{{ old('nombre', $profesor->nombre) }}" class="form-control" id="nombre" name="nombre" required maxlength="100" placeholder="introduce el nombre del alumno">
        @error('nombre')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" value="{{ old('apellidos', $profesor->apellidos) }}" class="form-control" id="apellidos" name="apellidos" required maxlength="100" placeholder="introduce el apellido del alumno">
        @error('apellidos')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="especialidad" class="form-label">Especialidad</label>
        <input type="string" value="{{ old('especialidad', $profesor->especialidad) }}" class="form-control" id="especialidad" name="especialidad" required maxlength="100"  placeholder="introduce tu especialidad">
        @error('especialidad')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="f-alta" class="form-label">Fecha de alta</label>
        <input type="date" value="{{ old('f-alta', $profesor->{'f-alta'}) }}" class="form-control" id="f-alta" name="f-alta">
        @error('f-alta')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
        
    </div>

    <div class="mb-3">
        <label for="salario" class="form-label">Salario</label>
        <input type="number" value="{{ old('salario', $profesor->salario) }}" class="form-control" id="salario" name="salario" step="0.01" placeholder="Introduce tu salario">
        @error('salario')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn-secondary">
        Editar profesor
    </button>

</form>
@endsection