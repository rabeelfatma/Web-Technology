<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    // Category → Products (ONE to MANY)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
