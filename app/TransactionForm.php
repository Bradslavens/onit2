<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionForm extends Model
{
    // set the table name
    // 
    protected $table = 'form_transaction';

    public function signers()
    {
        return $this->belongsToMany(Signer::class)->withPivot('role');
    }
}
