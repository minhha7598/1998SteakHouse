<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\Table;

class AdminController extends Controller
{
    public function index()
    {
        $order = Order::all();
        $orderCount = count($order);
        $menu = Menu::all();
        $menuCount = count($menu);
        $category = Category::all();
        $categoryCount = count($category);
        $reservation = Reservation::all();
        $reservationCount = count($reservation);
        $table = Table::all();
        $tableCount = count($table);
        return view('admin.index', compact('orderCount', 'menuCount', 'categoryCount', 'reservationCount','tableCount'));
    }
}
