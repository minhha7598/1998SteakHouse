<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Cart;

class CartController extends Controller
{
    public function cartList(Request $request)
    {
      if($request->session()->has('Cart')){
        $Cart = $request->session()->get('Cart');
        $cartCount = count($Cart->products);

        return view('cart.index', compact('Cart', 'cartCount'));
      }else{
        return view('cart.index');
      }
    }

    public function addToCart(Request $request, $id)
    {
        $product = Menu::where('id', $id)->first();
  
        if($product != null)
        {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
          
            $request->session()->put('Cart', $newCart);
        }
        return to_route('cart.list')->with('Success', 'Add new dish successfully.');
    }

    public function saveCart(Request $request, $id, $quantity)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->saveCart($id, $quantity);
          
        $request->session()->put('Cart', $newCart);
        
        return to_route('cart.list')->with('Success', 'Update dish successfully!');;
    }

    public function removeCart(Request $request, $id, $quantity)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->removeCart($id, $quantity);
      
        $request->session()->put('Cart', $newCart);
        
        return to_route('cart.list')->with('Success', 'Delete dish successfully!');
    }

    public function clearAllCart(Request $request)
    {
        $request->session()->forget('Cart');
    
        return to_route('cart.list')->with('Success', 'Remove all dishes successfully!');
    }

    public function detail(Request $request, $id)
    {
        $product = Menu::where('id', $id)->first();
        $request->session()->put('Detail', $product);
        
        return view('detail.index', compact('product'));
    }
}