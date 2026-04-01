<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'quantity',
        'location',
        'min_stock',
        'max_stock',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
