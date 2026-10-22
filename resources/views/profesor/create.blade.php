@extends('template.base')

@section('content')
<form action="{{ route('profesor.store') }}" method="post" novalidate>
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label> 
        <input type="text" value="{{ old('nombre') }}" class="form-control" id="nombre" name="nombre" required maxlength="100" placeholder="introduce el nombre del profesor">
        @error('nombre')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" value="{{ old('apellidos') }}" class="form-control" id="apellidos" name="apellidos" required maxlength="100" placeholder="introduce el apellido del profesor">
        @error('apellidos')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="especialidad" class="form-label">Especialidad</label>
        <input type="string" value="{{ old('especialidad') }}" class="form-control" id="especialidad" name="especialidad" required maxlength="100"  placeholder="introduce tu especialidad">
        @error('especialidad')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="f-alta" class="form-label">fecha de alta</label>
        <input type="date" value="{{ old('f-alta') }}" class="form-control" id="f-alta" name="f-alta"  placeholder="introduce tu fecha de alta">
        @error('f-alta')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
        
    </div>

    <div class="mb-3">
        <label for="salario" class="form-label">salario</label>
        <input type="number" value="{{ old('salario') }}" class="form-control" id="salario" name="salario" step="0.01" placeholder="Introduce el salario">
        @error('salario')
            <div class="alert alert-danger" role="alert" style="margin-top: 6px;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn-secondary">
        Crear profesor
    </button>

</form>
@endsection