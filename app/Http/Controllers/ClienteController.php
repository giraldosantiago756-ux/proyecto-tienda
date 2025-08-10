<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = cliente::all();
        return view('cliente.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =  $request->validated();

        
        cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success','registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        

        $cliente = cliente::find($id);
        return view('cliente.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([ 
            'nombre' => 'required|min:3|max:255',
            'apellido' => 'required|min:3|max:255',
            'direccion' => 'required|min:3|max:255',
            'fechanacimiento' =>'required|min:3|max:255',
            'telefono' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'fecharegistro' => 'required|min:3|max:255',
            'genero' => 'required|min:3|max:255',
        ]);

        $clientes = cliente::find($id);
        $clientes->update($request->all());
        return redirect()->route('cliente.index')->with('success','registro a sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        cliente::find($id)->delete();
        return redirect()->route('cliente.index')->with('success','registro eliminado correctamente');
    }
}
