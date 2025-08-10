<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable=['nombre','descripcion','precio','preciocompra','stock','idcategoria','idmarca','fechacreacion','estado'];

    public function marca(){
        return $this->belongsTo(marca::class,'idmarca');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class,'idcategoria');
    }

    public function detallefactura(){
        return $this->hasMany(detallefactura::class);
    }
}
