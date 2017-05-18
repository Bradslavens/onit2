<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signer extends Model
{
    //
    public function transactionForms()
    {
        return $this->belongsToMany(TransactionForm::class);
    }
}
