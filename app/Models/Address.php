<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'city',
        'postal_code',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
