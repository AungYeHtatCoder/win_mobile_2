<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand_id',
        'img1',
        'img2',
        'img3',
        'img4',
        'description',
    ];
 protected $appends = ['img1_url', 'img2_url', 'img3_url', 'img4_url'];

    public function getImg1UrlAttribute(){
        return asset('assets/img/products/'.$this->img1);
    }

    public function getImg2UrlAttribute(){
        return asset('assets/img/products/'.$this->img2);
    }

    public function getImg3UrlAttribute(){
        return asset('assets/img/products/'.$this->img3);
    }

    public function getImg4UrlAttribute(){
        return asset('assets/img/products/'.$this->img4);
    }
    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot(['qty', 'normal_price', 'discount_price']);;
    }

     public function brand(){
        return $this->belongsTo(Brand::class);
    }

}