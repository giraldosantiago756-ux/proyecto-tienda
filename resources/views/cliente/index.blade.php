@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gestion de clientes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{route('cliente.create')}}" class="btn btn-primary">Crear un nuevo cliente</a>
    <table class="table" id="myTable">
    <thead>
        <tr>
            <td>id</td>
            <td>nombre</td>
            <td>apellido</td>
            <td>direccion</td>
            <td>fechanacimiento</td>
            <td>telefono</td>
            <td>email</td>
            <td>fecharegistro</td>
            <td>genero</td>
            <td>opciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->apellido}}</td>
            <td>{{$cliente->direccion}}</td>
            <td>{{$cliente->fechanacimiento}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->fecharegistro}}</td>
            <td>{{$cliente->genero}}</td>
            <td>
                <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-success">Editar</a>

                <form action="{{route('cliente.destroy', $cliente->id)}}" method="POST">
                    @csrf
                <button type="submit" class="btn btn-danger" onclick="confirmarEliminacion(event)">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    <a href="{{route('index')}}" class="btn btn-info">Volver</a>
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