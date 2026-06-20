<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'stock',
        'low_stock_threshold'
    ];

    // Ingredient → RecipeItems (ONE to MANY)
    public function recipeItems()
    {
        return $this->hasMany(RecipeItem::class);
    }
}
