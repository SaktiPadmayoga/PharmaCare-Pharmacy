<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable =[
        'user_id',
        'address_id',
        'total_price',
        'status',
    ];

    public function transaction_details(){
        return $this->hasMany(Transaction_Detail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }
}
