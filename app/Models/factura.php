<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    protected $fillable=['idcliente','idestado','fecha','idmodopago','subtotal','impuestos','total'];

    public function estado(){
        return $this->belongsTo(cliente::class,'idcliente');
    }

    public function cliente(){
        return $this->belongsTo(estado::class,'idestado');
    }
    
    public function modopago(){
        return $this->belongsTo(modopago::class,'idmodopago');
    }
    
    public function detallefactura(){
        return $this->hasMany(detallefactura::class);
    }

}
