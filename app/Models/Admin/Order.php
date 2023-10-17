<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sub_total',
        'payment_method',
        'status',
        'payment_photo'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
