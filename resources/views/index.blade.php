@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Citas</h1>
    <a href="{{ route('citas.create') }}" class="btn btn-primary mb-3">Crear Cita</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Fecha y Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>{{ $cita->user->nombre }}</td>
                <td>{{ $cita->servicio->nombre }}</td>
                <td>{{ $cita->fecha_hora }}</td>
                <td>{{ ucfirst($cita->estado) }}</td>
                <td>
                    <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
