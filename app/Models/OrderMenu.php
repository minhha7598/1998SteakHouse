<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMenu extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'order_quantity', 'order_price', 'menu_id', 'order_id'];

    public function menus ()
    {
        return $this->hasMany(Product::class, 'menu_id');
    }

    public function orders ()
    {
        return $this->hasMany(Order::class, 'order_id');
    }
}
