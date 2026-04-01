<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
}
