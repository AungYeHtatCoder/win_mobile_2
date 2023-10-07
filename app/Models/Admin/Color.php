<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function product_prices(){
        return $this->hasMany(ProductPrice::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function accessories(){
        return $this->belongsToMany(Accessory::class)->withPivot(['qty', 'normal_price', 'discount_price']);;
    }
}