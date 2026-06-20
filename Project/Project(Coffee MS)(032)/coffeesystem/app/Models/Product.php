<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'is_active',
        'image'
    ];

    // Product → Category (MANY to ONE)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product → Recipe (ONE to ONE)
    public function recipe()
    {
        return $this->hasOne(Recipe::class);
    }

    // Product → OrderItems (ONE to MANY)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Accessor: formatted price
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    // Scope: active products
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
