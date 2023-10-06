<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function product_prices(){
        return $this->hasMany(ProductPrice::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
