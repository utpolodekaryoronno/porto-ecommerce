<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $products = Product::latest()->get();
        return view('BackEnd.product.index', compact('products'));
    }
}


