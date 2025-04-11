<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable =[
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(Cart_Item::class);
    }

    public function selectedItems()
    {
        return $this->hasMany(Cart_Item::class)->where('selected', true);
    }
}
