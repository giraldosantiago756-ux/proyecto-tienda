
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gestion de productos</h1>
@stop

@section('content')
<a href="{{route('producto.create')}}" class="btn btn-primary">Crear nuevo producto</a>
<div class="row">
    <div class="col-12">
        <table class="table" id="myTable">
        <thead>
            <tr>
                <td>id</td>
                <td>nombre</td>
                <td>descripcion</td>
                <td>precio</td>
                <td>preciocompra</td>
                <td>stock</td>
                <td>categoria</td>
                <td>marca</td>
                <td>fechacreacion</td>
                <td>estado</td>
                <td>opciones</td>
            </tr>
        </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id}}</td>
            <td>{{ $producto->nombre}}</td>
            <td>{{ $producto->descripcion}}</td>
            <td>{{ $producto->precio}}</td>
            <td>{{ $producto->preciocompra}}</td>
            <td>{{ $producto->stock}}</td>
            <td>{{ $producto->categoria->nombre}}</td>
            <td>{{ $producto->marca->nombre}}</td>
            <td>{{ $producto->fechacreacion}}</td>
            <td>
                @if($producto->estado == 1)
                    Activo
                @else
                    Inactivo
                @endif
            
            </td>
            <td>
                <a href="{{route('producto.edit', $producto->id)}}" class="btn btn-success">Editar</a>

                <form action="{{route('producto.destroy', $producto->id)}}" method="POST">
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