@extends('template.base')


@section('css')
    <link href="{{ asset('assets/style/show.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container my-5">
    <div class="row g-4">
        
        <div class="col-12 col-md-6">
            <div class="card text-center">
            <img src="{{ asset('assets/img/alumno.jpg') }}" class="card-img-top" alt="Alumno">
                <div class="card-body">
                    <h5 class="card-title">{{ $profesor->nombre . " " . $profesor->apellidos }}</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ $profesor->especialidad }}</h5>
                     <h5 class="card-title">{{ $profesor->salario }}</h5>
                      <h5 class="card-title">{{ $profesor->{'f-alta'} ? Carbon\Carbon::parse($profesor->{'f-alta'})->locale('es')->translatedFormat('d/m/Y') : '' }}</h5>
                      <a href="{{ route('profesor.index') }}" class="btn btn-primary">Back</a>
                      <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection