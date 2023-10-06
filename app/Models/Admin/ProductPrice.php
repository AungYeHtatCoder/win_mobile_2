<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'color_id',
        'storage_id',
        'ram_id',
        'category_id',
        'qty',
        'normal_price',
        'discount_price',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function storage(){
        return $this->belongsTo(Storage::class);
    }

    public function ram(){
        return $this->belongsTo(Ram::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
