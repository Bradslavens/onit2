<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class)->withPivot('id');
    }

    public function signers()
    {
        return $this->hasMany(Signer::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class)->withPivot('role');
    }
}
