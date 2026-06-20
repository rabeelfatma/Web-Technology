<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'modifiers'
    ];

    // OrderItem → Order (MANY to ONE)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // OrderItem → Product (MANY to ONE)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
