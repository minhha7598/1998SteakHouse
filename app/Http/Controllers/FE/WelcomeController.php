<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $specials = Category::where('name', 'Specials')->first();
        $request->session()->forget('reservation');
        return view('welcome', compact('specials'));
    }
}
