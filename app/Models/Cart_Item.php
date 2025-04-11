<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_Item extends Model
{
    protected $fillable = [
        'cart_id', 
        'medicine_id',
        'quantity',
        'price',
        'selected'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
