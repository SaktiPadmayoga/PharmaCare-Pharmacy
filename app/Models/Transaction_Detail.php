<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction_Detail extends Model
{
    protected $fillable = [
        'transaction_id',
        'medicine_id',
        'quantity',
        'price',
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
