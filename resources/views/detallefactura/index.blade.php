@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gestion de detalle de facturas</h1>
@stop

@section('content')
<a href="{{route('detallefactura.create')}}" class="btn btn-primary">Crear nuevo detalle de factura</a>
<div class="row">
    <div class="col-12">
        <table class="table" id="myTable">
<thead>
    <tr>
        <td>id</td>
        <td>cantidad</td>
        <td>preciounitario</td>
        <td>totallinea</td>
        <td>prodcuto</td>
        <td>factura</td>
        <td>opciones</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($detallefacturas as $detallefactura)
    <tr>
        <td>{{ $detallefactura->id}}</td>
        <td>{{ $detallefactura->cantidad}}</td>
        <td>{{ $detallefactura->preciounitario}}</td>
        <td>{{ $detallefactura->totallinea}}</td>
        <td>{{ $detallefactura->producto->nombre}}</td>
        <td>{{ $detallefactura->factura->total}}</td>
        <td>
        <a href="{{route('detallefactura.edit', $detallefactura->id)}}" class="btn btn-success">Editar</a>

            <form action="{{route('detallefactura.destroy', $detallefactura->id)}}" method="POST">
                @csrf
            <button type="submit" class="btn btn-danger" onclick="confirmarEliminacion(event)">Eliminar</button>
            </form>
        </td>
    </tr>
        
    @endforeach
    </tbody>
</table>
    <a href="{{route('index')}}" class="btn btn-info">volver</a>
    </div>
</div>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar',
                timer: 3000
            });
        });
    </script>
@endif
<script>
    function confirmarEliminacion(event) {
        event.preventDefault();
        const form = event.target.closest('form');
        
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>



@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

<script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                // Opciones personalizadas, si las necesitas
                responsive: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
                }
            });
        });
    </script>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop