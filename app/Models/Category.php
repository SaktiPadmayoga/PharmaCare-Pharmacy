<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = ['name'];

    public function medicines(): BelongsToMany
    {
        return $this->belongsToMany(Medicine::class, 'category_medicine', 'category_id', 'medicine_id')
                    ->withTimestamps();
    }
}
