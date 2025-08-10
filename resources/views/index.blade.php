@extends('adminlte::page')

@section('title', 'Market')

@section('content_header')
<h1>Market</h1>
@stop

@section('content')
<div class="row ">
    <div class="col-md-12">
   
           
            <div class="card-body">
                <div class="row">
                   
                                <a href="{{ route('marca.index') }}" class="btn btn-success" title="Gestión de marcas">Gestion de marcas</a>
                         
                   
                                 <a href="{{ route('categoria.index') }}" class="btn btn-success" title="Gestión de categorías" >Gestion de categorias</a>
                  
                       
                                <a href="{{ route('estado.index') }} "title="Gestión de estados" class="btn btn-success">Gestion de estados</a>
                       

              
            
                                 <a href="{{ route('modopago.index') }}" title="Modos de pago" class="btn btn-success">Gestion de modos de pago</a>
                            
                        
                    
                   
                                <a href="{{ route('cliente.index') }}" title="Gestión de clientes" class="btn btn-success">Gestion de clientes</a>
                       
                    
                                <a href="{{ route('producto.index') }}" title="Gestión de productos" class="btn btn-success">Gestion de productos</a>
                        

               
                                <a href="{{ route('factura.index') }}" title="Gestión de facturas" class="btn btn-success">Gestion de facturas</a>
                     
                    
                                <a href="{{ route('detallefactura.index') }}"title="Detalle de facturas" class="btn btn-success">Gestion de facturas</a>
                   

                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<style>
    body {
        background-image:
    }
</style>
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop