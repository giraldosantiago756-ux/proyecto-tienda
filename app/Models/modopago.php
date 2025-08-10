<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modopago extends Model
{
    protected $fillable =['nombre','descripcion','activo'];

    public function factura(){
        return $this->hasMany(factura::class);
    }
}
