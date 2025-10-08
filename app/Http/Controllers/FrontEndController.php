<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('FrontEnd.index', compact('products'));
    }
}
