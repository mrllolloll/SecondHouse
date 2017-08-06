<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public function scopeValidateFile($url)
    {
        echo "Hola";
    }
}
