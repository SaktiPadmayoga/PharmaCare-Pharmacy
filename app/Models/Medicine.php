<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_medicine', 'medicine_id', 'category_id')->withTimestamps();
    }

    // public function procurement_details()
    // {
    //     return $this->hasMany(procurement_details::class);
    // }
}
