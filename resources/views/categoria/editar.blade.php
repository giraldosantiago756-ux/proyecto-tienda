@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear una nueva categoria</h1>
@stop

@section('content')
<a href="{{route('categoria.index')}}"class = "btn btn-info">Volver</a>
<div class="row">
    <div class="col-6">
        <form action="{{route('categoria.update', $categoria->id)}}" method="post">
            @csrf
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{$categoria->nombre}}" class="form-control @error('nombre') is-invalid @enderror">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="descripcion" class="form-label">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="{{$categoria->descripcion}}" class="form-control @error('descripcion') is-invalid @enderror">
            
            
            @error('descripcion')
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