<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\marca;
use App\Models\modopago;
use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas= marca::all();
        $categorias= categoria::all();
        return view('producto.crear', compact('marcas','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([ 
            'nombre' => 'required|min:3|max:255',
            'descripcion' => 'required|min:3|max:255',
            'precio' => 'required|min:3|max:255',
            'preciocompra' =>'required|min:3|max:255',
            'stock' => 'required|min:3|max:255',
            'fechacreacion' => 'required|min:3|max:255',
            
        ]);

        producto::create($request->all());
        return redirect()->route('producto.index')->with('success','registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $producto = producto::find($id);
        $categorias = categoria::all();
        $marcas = marca::all();
        return view('producto.editar', compact('producto','categorias','marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([ 
            'nombre' => 'required|min:3|max:255',
            'descripcion' => 'required|min:3|max:255',
            'precio' => 'required|min:3|max:255',
            'preciocompra' =>'required|min:3|max:255',
            'stock' => 'required|min:3|max:255',
            'fechacreacion' => 'required|min:3|max:255',
            
        ]);

        $producto=producto::find($id);
        $producto->update($request->all());
        return redirect()->route('producto.index')->with('success','registro a sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        producto::find($id)->delete();
        return redirect()->route('producto.index')->with('success','registro eliminado correctamente');
    }
}
