<?php

namespace App\Http\Controllers;

use App\Models\detalleactura;
use App\Models\detallefactura;
use App\Models\factura;
use App\Models\producto;
use Illuminate\Http\Request;

class DetallefacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $detallefacturas= detallefactura::all();
    return view('detallefactura.index',compact('detallefacturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = producto::all();
        $facturas = factura::all();
        return view('detallefactura.crear',compact('productos','facturas'));
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
        
            'cantidad' => 'required|min:3|max:255',
            'preciounitario' => 'required|min:3|max:255',
            'totallinea' => 'required|min:3|max:255',
        ]);

        detallefactura::create($request->all());
        return redirect()->route('detallefactura.index')->with('success','registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detallefactura  $detallefactura
     * @return \Illuminate\Http\Response
     */
    public function show(detallefactura $detallefactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detallefactura  $detallefactura
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
{
    $detallefactura = detallefactura::find($id);
    $productos = producto::all();
    $facturas = factura::all();
    return view('detallefactura.editar',compact('detallefactura','productos','facturas'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detallefactura  $detallefactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([ 
            'cantidad' => 'required|min:3|max:255',
            'preciounitario' => 'required|min:3|max:255',
            'totallinea' => 'required|min:3|max:255',

        ]);
        $detallefactura=detallefactura::find($id);
        $detallefactura->update($request->all());
        return redirect()->route('detallefactura.index')->with('success','registro a sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detallefactura  $detallefactura
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        detallefactura::find($id)->delete();
        return redirect()->route('detallefactura.index')->with('success','registro eliminado correctamente');
    }
}
