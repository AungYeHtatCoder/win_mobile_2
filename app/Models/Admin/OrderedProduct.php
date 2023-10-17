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

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function accessory(){
        return $this->belongsTo(Accessory::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function product_prices(){
        return $this->belongsTo(ProductPrice::class);
    }
}
