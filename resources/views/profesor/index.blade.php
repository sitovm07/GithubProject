@extends('template.base')
@section('content')

    <a href="{{ route('profesor.create') }}" class="btn btn-primary">Crear Profesor</a>

    <table class="table table-hover">
            @foreach($profesor as $profesor)
                <tr>
                    <td>{{  $profesor->id }}</td>
                    <td>{{  $profesor->nombre }}</td>
                    <td>{{  $profesor->apellidos }}</td>
                    <td>{{ $profesor->especialidad }}</td>
                    <td>{{ $profesor->{'f-alta'} ? Carbon\Carbon::parse($profesor->{'f-alta'})->locale('es')->translatedFormat('d/m/Y') : '' }}</td>
                    <td>{{  $profesor->salario }}</td>
                    <td>
                        <a href="{{ route('profesor.show', $profesor) }}" class="btn btn-secondary">View</a>
                        <a href="{{ route('profesor.edit', $profesor) }}" class="btn btn-secondary">Edit</a>
                        <!--<a href="{{ route('index') }}" class="btn btn-secondary">Delete</a>
                        -->
                        <form data-message="{{ $profesor->apellidos . ', ' . $profesor->nombre }}" class="confirm-dialog" action="{{ route('profesor.destroy', $profesor) }}" method="post" style="display: inline;">
                            @csrf
                            @method('delete')
                            <input type="submit" name="" value="Delete" class="btn btn-secondary">

                        </form>
    
                </tr>
            @endforeach
            </table>
 

@endsection

@section('script')

    <script>
            document.querySelectorAll('form.confirm-dialog').forEach(
                form => {
                    form.addEventListener('submit', e => {
                        const message = '¿Seguro que quieres borrar al profesor?' + form.dataset.message + '?';
                        if (!confirm(message)) {
                            e.preventDefault();
                        }
                    })
                }
            );
    </script>

@endsection
