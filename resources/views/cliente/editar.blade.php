@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar un nuevo cliente</h1>
@stop

@section('content')
    
<a href="{{route('cliente.index')}}" class="btn btn-info">Volver</a>
<div class="row">
    <div class="col-6">
        <form action="{{route('cliente.update', $cliente->id)}}" method="POST">
        @csrf
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{$cliente->nombre}}" class="form-control @error('descripcion') is-invalid @enderror">
        @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" id="apellido" value="{{$cliente->apellido}}" class="form-control @error('descripcion') is-invalid @enderror">
        @error('apellido')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        <label for="direccion" class="form-label">direeccion</label>
        <input type="text" name="direccion" id="direccion" value="{{$cliente->direccion}}" class="form-control @error('descripcion') is-invalid @enderror">
        @error('direccion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        
        <label for="fechanacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fechanacimiento" id="fechanacimiento" value="{{$cliente->fechanacimiento}}" class="form-control @error('descripcion') is-invalid @enderror">
        @error('fechanacimiento')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        
        <label for="telefono" class="form-label">Telefono</label>
        <input type="text" name="telefono" id="telefono" value="{{$cliente->telefono}}" class="form-control @error('descripcion') is-invalid @enderror">
        @error('telefono')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" id="email" value="{{$cliente->email}}" class="form-control @error('descripcion') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    
        <label for="fecharegistro" class="form-label">Fecha de registro:</label>
        <input type="date" name="fecharegistro" id="fecharegistro" value="{{$cliente->fecharegistro}}" class="form-control @error('descripcion') is-invalid @enderror">
        @error('fecharegistro')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    
        <label for="genero" class="form-label">Genero</label>
        <select name="genero" id="genero">
        <option value="femenino">Femenino</option>
        <option value="masculino">Masculino</option>
        </select>
        @error('genero')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

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