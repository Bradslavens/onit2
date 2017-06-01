<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signer extends Model
{
    protected $fillable = ['name', 'transaction_id', 'user_id'];
    
    //
    public function transactionForms()
    {
        return $this->belongsToMany(TransactionForm::class)->withPivot(['status', 'executed_date']);
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
