@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo detalle de factura</h1>
@stop

@section('content')
<a href="{{route('detallefactura.index')}}" class = "btn btn-info">Volver</a>
<div class="row">
<div class="col-6">
<form action="{{route('detallefactura.update',$detallefactura->id)}}" method="POST">
        @csrf
            <label for="cantidad" class="form-label">Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad" value="{{$detallefactura->cantidad}}" class="form-control @error('cantidad') is-invalid @enderror">
            @error('cantidad')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="preciounitario" class="form-label">Precio Unitario:</label>
        <input type="number" name="preciounitario" id="preciounitario" value="{{$detallefactura->preciounitario}}" class="form-control @error('preciounitario') is-invalid @enderror">
        @error('preciounitario')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="totallinea" class="form-label">Total de Línea:</label>
        <input type="number" name="totallinea" id="totallinea" value="{{$detallefactura->preciounitario}}" class="form-control @error('totallinea') is-invalid @enderror">
        @error('totallinea')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="idproducto" class="form-label">Producto</label>
        <select name="idproducto" id="idproducto" class="form-control @error('idproducto') is-invalid @enderror">
        @foreach ($productos as $producto)
        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
        @endforeach
        </select>
        @error('idproducto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

<label for="idfactura" class="form-label">Factura</label>
<select name="idfactura" id="idfactura" class="form-control @error('idfactura') is-invalid @enderror">
    @foreach ($facturas as $factura)
        <option value="{{ $factura->id }}">{{ $factura->total }}</option>
    @endforeach
</select>
@error('idfactura')
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

