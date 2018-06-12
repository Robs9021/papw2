<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function empresa()
    {
    	return $this->belongsTo(Empresa::class);
    }

    public function creador()
    {
    	return $this->belongsTo(Usuario::class);
    }

    public function registrados()
    {
    	return $this->hasMany(Usuario::class);
    }
}
