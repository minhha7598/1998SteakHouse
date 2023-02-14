<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'first_name', 'last_name', 'address', 'country', 'email', 'phone_number', 'delivery', 'description', 'date', 'total_quantity', 'total_price_usd', 'total_price', 'is_online'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'category_menu');
    }

    public function order_menu()
    {
        return $this->belongsTo(Menu::class, 'order_id');
    }
}
