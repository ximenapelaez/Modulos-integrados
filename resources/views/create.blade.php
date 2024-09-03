@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Cita</h1>
    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Cliente</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="servicio_id">Servicio</label>
            <select name="servicio_id" id="servicio_id" class="form-control">
                @foreach($servicios as $servicio)
                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_hora">Fecha y Hora</label>
            <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="pendiente">Pendiente</option>
                <option value="completada">Completada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

