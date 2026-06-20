<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id'
    ];

    // Recipe → Product (ONE to ONE inverse)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Recipe → RecipeItems (ONE to MANY)
    public function recipeItems()
    {
        return $this->hasMany(RecipeItem::class);
    }
}
