<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signer extends Model
{
    protected $fillable = ['name', 'transanction_id', 'user_id'];
    
    //
    public function transactionForms()
    {
        return $this->belongsToMany(TransactionForm::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function forms()
    {
        return $this->belongsTo(Form::class);
    }
}
