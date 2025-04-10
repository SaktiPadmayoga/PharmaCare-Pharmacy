<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    protected $fillable = [
        'supplier_id',
        'date',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function procurement_details()
    {
        return $this->hasMany(Procurement_Detail::class, 'procurement_id');
    }
}

