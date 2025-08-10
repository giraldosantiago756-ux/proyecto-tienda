<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallefactura extends Model
{
    protected $fillable = ['cantidad','preciounitario','totallinea','idfactura','idproducto'];

    public function producto(){
        return $this->belongsTo(producto::class,'idproducto');
    }
    
    public function factura(){
        return $this->belongsTo(factura::class,'idfactura');
    }
}
