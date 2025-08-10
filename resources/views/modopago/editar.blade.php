@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo modo de pago</h1>
@stop

@section('content')
<a href="{{route('modopago.index')}}" class = "btn btn-info">Volver</a>
<div class="row">
    <div class="col-6">
        <form action="{{route('modopago.update', $modopago->id)}}" method="POST">
        @csrf
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{$modopago->nombre}}" class="form-control @error('nombre') is-invalid @enderror">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="descripcion" class="form-label">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="{{$modopago->descripcion}}" class="form-control @error('descripcion') is-invalid @enderror">
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            <label for="activo" class="form-label">Activo</label>
            <select name="activo" id="activo" class="form-control @error('descripcion') is-invalid @enderror">
            <option value="1">Activo</option>
            <option value="0">No Activo</option>
            @error('estado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </select>

            <button type="submit" class="btn btn-success">Guardar</button>
            
        </form>
    </div>
</div>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop