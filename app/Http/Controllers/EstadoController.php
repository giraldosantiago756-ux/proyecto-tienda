<?php

namespace App\Http\Controllers;

use App\Models\estado;
use App\Models\marca;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados= estado::all();
        return view('estado.index',compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = estado::all();
        return view('estado.crear');
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
        'descripcion' => 'required|min:3|max:255',
            
            ]);

        estado::create($request->all());
        return redirect()->route('estado.index')->with('success','registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {   
        $estado= estado::find($id);
        return view('estado.editar',compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {   
        
        $request->validate([
        'descripcion' => 'required|min:3|max:255',
            
            ]);

        $estados = estado::find($id);
        $estados->update($request->all());
        return redirect()->route('estado.index')->with('success','registro a sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        estado::find($id)->delete();
        return redirect()->route('estado.index')->with('success','registro eliminado correctamente');
    }
}
