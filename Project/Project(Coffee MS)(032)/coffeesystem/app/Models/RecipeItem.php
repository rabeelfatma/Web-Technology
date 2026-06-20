<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'ingredient_id',
        'quantity_used'
    ];

    // RecipeItem → Recipe (MANY to ONE)
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    // RecipeItem → Ingredient (MANY to ONE)
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
