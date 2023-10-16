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
        'user_id',
    ];

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

    public function user(){
        return $this->belongsTo(User::class);
    }
}
