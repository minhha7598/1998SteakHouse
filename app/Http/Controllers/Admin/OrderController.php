<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{    
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function detail($id)
    {
        $orderRecord = Order::Where('id', $id)->first();
        $orderMenuRecords = OrderMenu::Where('order_id', $id)->get()->toArray();
       
        $menuRecords = array();
        foreach($orderMenuRecords as $ordeMenu){
            $menuId = $ordeMenu['menu_id'];
            $menuRecord = Menu::Where('id', $menuId)->first()->toArray();
            array_push($menuRecords, $menuRecord);
        }
    
        $index = 0;
        $products = array();
        foreach($orderMenuRecords as $key => $ordeMenu){
            array_push($products, $ordeMenu);
            foreach($menuRecords as $key => $menu){
                $menuArr = array('name'=>$menu['name'], 'image'=>$menu['image'], 'price'=>$menu['price'] );
                if($key == $index){
                    array_push($products[$index], $menuArr);
                }
            }
            $index++;
        }
        //dd($products);
       
        return view('admin.orders.detail', compact('orderRecord', 'products'));
    }
}
