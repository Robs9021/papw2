<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function empresa()
    {
    	return $this->belongsTo(Empresa::class);
    }
}
