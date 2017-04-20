<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    return $this->belongsToMany('App\IList');
}
