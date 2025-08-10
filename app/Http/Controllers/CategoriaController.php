<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoriaRequest;
use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias =categoria::all();
        return view('categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categoria::all();
        return view('categoria.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoriaRequest $request)
    {

        $validated =  $request->validated();

        categoria::create($request->all());
        return redirect()->route('categoria.index')->with('success','registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $categoria=categoria::find($id);
        return view('categoria.editar',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {   
    
        $request->validate([
        'nombre' => 'required|min:3|max:255',
        'descripcion' => 'required|min:3|max:255',
            
            ]);
        
        $categoria = categoria::find($id);
        $categoria->update($request->all());
        return redirect()->route('categoria.index')->with('success','registro a sido actualizado correctamente');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        categoria::find($id)->delete();
        return redirect()->route('categoria.index')->with('success','registro eliminado correctamente');
    }
}
