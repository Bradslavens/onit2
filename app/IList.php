<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IList extends Model
{
    public function item()
    {
        return $this->belongsToMany('App\Item');
    }
}
