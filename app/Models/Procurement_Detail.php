<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procurement_Detail extends Model
{
    protected $fillable = [
        'procurement_id',
        'medicine_id',
        'quantity',
        'price',
    ];

    public function procurement(){
        return $this->belongsTo(Procurement::class);
    }

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}
