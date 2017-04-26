<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
