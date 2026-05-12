<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'unit',
        'current_stock',
        'min_stock',
        'sell_price',
        'buy_price',
        'weight_size',
        'storage_location',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
