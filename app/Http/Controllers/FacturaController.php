<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\estado;
use App\Models\factura;
use App\Models\modopago;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas= factura::all();
        return view('factura.index',compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes= cliente::all();
        $estados= estado::all();
        $modopagos= modopago::all();
        return view('factura.crear',compact('clientes','estados','modopagos'));
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
            'fecha' => 'required|min:3|max:255',
            'subtotal' => 'required|min:3|max:255',
            'impuestos' => 'required|min:3|max:255',
            'total' => 'required|min:3|max:255',

        ]);

        factura::create($request->all());
        return redirect()->route('factura.index')->with('success','registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
{
    $factura = factura::find($id);
    $clientes = cliente::all();
    $modopagos = modopago::all();
    $estados = estado::all();
return view('factura.editar', compact('factura', 'clientes', 'modopagos', 'estados'));
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([ 
            'fecha' => 'required|min:3|max:255',
            'subtotal' => 'required|min:3|max:255',
            'impuestos' => 'required|min:3|max:255',
            'total' => 'required|min:3|max:255',

        ]);

        $factura=factura::find($id);
        $factura->update($request->all());
        return redirect()->route('factura.index')->with('success','registro a sido actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        factura::find($id)->delete();
        return redirect()->route('factura.index')->with('success','registro eliminado correctamente');
    }
}
