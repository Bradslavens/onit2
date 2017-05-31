<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }

    public function signers()
    {
        return $this->belongsToMany(Signer::class);
    }
}
