<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img1',
        'img2',
        'img3',
        'img4',
        'description',
    ];

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

}
