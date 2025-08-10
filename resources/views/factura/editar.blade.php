@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar nueva factura</h1>
@stop

@section('content')
<a href="{{route('factura.index')}}" class = "btn btn-info">Volver</a>
<div class="row">
<div class="col-6">
<form action="{{route('factura.update',$factura->id)}}" method="POST">
        @csrf
            <label for="fecha" class="form-label">Fecha:</label>
<input type="date" name="fecha" id="fecha" value="{{$factura->fecha}}" class="form-control @error('fecha') is-invalid @enderror">
@error('fecha')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

<label for="total" class="form-label">Total:</label>
<input type="number" name="total" id="total" value="{{$factura->total}}" class="form-control @error('total') is-invalid @enderror">
@error('total')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

<label for="subtotal" class="form-label">Subtotal:</label>
<input type="number" name="subtotal" id="subtotal" value="{{$factura->subtotal}}" class="form-control @error('subtotal') is-invalid @enderror">
@error('subtotal')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

<label for="impuestos" class="form-label">Impuestos:</label>
<input type="number" name="impuestos" id="impuestos" value="{{$factura->impuestos}}" class="form-control @error('impuestos') is-invalid @enderror">
@error('impuestos')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

<label for="idcliente" class="form-label">Cliente</label>
<select name="idcliente" id="idcliente" value="{{$factura->cliente}}" class="form-control @error('idcliente') is-invalid @enderror">
    @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
    @endforeach
</select>
@error('idcliente')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

<label for="idestado" class="form-label">Estado</label>
<select name="idestado" id="idestado" value="{{$factura->estado}}" class="form-control @error('idestado') is-invalid @enderror">
    @foreach ($estados as $estado)
        <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
    @endforeach
</select>
@error('idestado')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

<label for="idmodopago" class="form-label">Modo de pago</label>
<select name="idmodopago" id="idmodopago" value="{{$factura->modopago}}" class="form-control @error('idmodopago') is-invalid @enderror">
    @foreach ($modopagos as $modopago)
        <option value="{{ $modopago->id }}">{{ $modopago->descripcion }}</option>
    @endforeach
</select>
@error('idmodopago')
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

