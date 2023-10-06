<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];



    public function product_prices(){
        return $this->hasMany(ProductPrice::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
