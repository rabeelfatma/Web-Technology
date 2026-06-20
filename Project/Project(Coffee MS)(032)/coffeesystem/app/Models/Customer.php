<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'loyalty_points'
    ];

    // Customer → Orders (ONE to MANY)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
