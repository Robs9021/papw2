<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
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
