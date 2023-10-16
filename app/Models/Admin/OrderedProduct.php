<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'accessory_id',
        'color_id',
        'product_prices_id',
        'qty',
        'unit_price',
        'total_price'
    ];
}
