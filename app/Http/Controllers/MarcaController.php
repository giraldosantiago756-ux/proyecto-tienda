<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas= marca::all();
        return view('marca.index',compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = marca::all();
        return view('marca.crear');
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
            
            ]);

        marca::create($request->all());
        return redirect()->route('marca.index')->with('success','registro creado correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $marca=marca::find($id);
        return view('marca.editar',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {   
        $request->validate([
        'nombre' => 'required|min:3|max:255',
        'descripcion' => 'required|min:3|max:255',
            
            ]);

        $marca = marca::find($id);
        $marca->update($request->all());
        return redirect()->route('marca.index')->with('success','registro a sido actualizado correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        marca::find($id)->delete();
        return redirect()->route('marca.index')->with('success','registro a sido eliminado correctamente');
    }
    
}
