<?php

namespace App\Http\Controllers;

use App\Models\modopago;
use Illuminate\Http\Request;

class ModopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modopagos =modopago::all();
        return view('modopago.index', compact('modopagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modopagos = modopago::all();
        return view('modopago.crear');
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

        modopago::create($request->all());
    return redirect()->route('modopago.index')->with('success','registro creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modopago  $modopago
     * @return \Illuminate\Http\Response
     */
    public function show(modopago $modopago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modopago  $modopago
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $modopago=modopago::find($id);
        return view('modopago.editar', compact('modopago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modopago  $modopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([ 
            'nombre' => 'required|min:3|max:255',
            'descripcion' => 'required|min:3|max:255',
            
        ]); 

        $modopagos=modopago::find($id);
        $modopagos->update($request->all());
    
        return redirect()->route('modopago.index')->with('success','registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modopago  $modopago
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        modopago::find($id)->delete();
        return redirect()->route('modopago.index')->with('success','registro eliminado correctamente');
    }
}
