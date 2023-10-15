<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'accessory_id',
        'color_id',
        'product_prices_id',
        'qty',
        'unit_price',
    ];
}
