<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teammate extends Model
{
    public function leader()
    {
        return $this->belongsTo(User::class);
    }
}
