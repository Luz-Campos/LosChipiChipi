<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(){
        $category = Category::all();
        $product = Product::all();

        return view('welcome')->with(['category' => $category,
            'product' => $product]);
    }
}
