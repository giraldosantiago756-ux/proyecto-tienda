@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear un nuevo producto</h1>
@stop

@section('content')
<a href="{{route('producto.index')}}" class = "btn btn-info">Volver</a>
<div class="row">
<div class="col-6">
<form action="{{route('producto.update', $producto->id)}}" method="POST">
        @csrf
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}" class="form-control @error('nombre') is->invalid @enderror">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="descripcion" class="form-label">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}" class="form-control @error('descripcion') is-invalid @enderror">
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
        
                @enderror
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" name="precio" id="precio" value="{{$producto->precio}}" class="form-control @error('descripcion') is->invalid @enderror">
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
        
            @enderror
            <label for="preciocompra" class="form-label">Precio de compra:</label>
            <input type="number" name="preciocompra" id="preciocompra" value="{{$producto->preciocompra}}" class="form-control @error('descripcion') is->invalid @enderror">
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
    
            @enderror
            <label for="stock" class="form-label">stock:</label>
            <input type="text" name="stock" id="stock" value="{{$producto->stock}}" class="form-control @error('descripcion') is->invalid @enderror">
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
    
            @enderror
            <label for="fechacreacion" class="form-label">Fecha de creacion:</label>
            <input type="date" name="fechacreacion" id="fechacreacion" value="{{$producto->fechacreacion}}" class="form-control @error('descripcion') is->invalid @enderror">
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            <label for="estado" class="form-label">Estado:</label>
            <select name="estado" id="estado" class="form-control">
            <option value="1"
            @if($producto->estado == 1)
            selected
            @endif
            >Activo</option>
    
            <option value="0"
            @if($producto->estado == 0)
            selected
            @endif
            >Inactivo</option>
            </select>
            
            @error('estado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </select>
    

                <label for="idmarca" class="form-label">Marca</label>
                <select name="idmarca" id="idmarca" class="form-control">
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}"
                            @if($marca->id == $producto->idmarca)
                                selected
                            @endif
                            >{{$marca->nombre}}</option>
                        @endforeach
                </select>    

                <label for="idcategoria" class="form-label">Categoria</label>
                <select name="idcategoria" id="idcategoria" class="form-control">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}"
                            @if($categoria->id == $producto->idcategoria)
                                selected
                            @endif
                            >{{$categoria->nombre}}</option>
                        @endforeach
                </select>


            <button type="submit" class="btn btn-success">Guardar</button>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop