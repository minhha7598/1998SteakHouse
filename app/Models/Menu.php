<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'price', 'quantity', 'description', 'image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_menu');
    }

    public function order_menu()
    {
        return $this->belongsTo(Order::class, 'menu_id');
    }
}
