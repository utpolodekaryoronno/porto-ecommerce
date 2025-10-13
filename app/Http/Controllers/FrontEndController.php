<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    // FrontEnd page load function
    public function index(){
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $tags = Tag::latest()->get();
        return view('FrontEnd.index', compact('products', 'categories', 'brands', 'tags'));
    }

    // Single Product Page Load Function
    public function ShowSingleProduct($slug){

        $product = Product::where('slug', $slug)->firstOrFail();

        $related_products = Category::find($product->categories->first()->id)->products;

        return view('FrontEnd.singleProduct', compact('product', 'related_products'));
    }


    // Category related show product
    public function CategoryProduct($slug){
        // get all regular data
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $tags = Tag::latest()->get();

        // get category with products
        $get_category = Category::where('slug', $slug)->first();

        if($get_category){
            $products = $get_category->products;
        }

        return view('FrontEnd.categoryRelatedProducts', compact('products', 'categories', 'brands', 'tags'));
    }

    // Brand related show product
    public function BrandProduct($slug){
        // get all regular data
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $tags = Tag::latest()->get();

        // get Brand with products
        $get_brands = Brand::where('slug', $slug)->first();

        if($get_brands){
            $products = $get_brands->products;
        }

        return view('FrontEnd.brandRelatedProducts', compact('products', 'categories', 'brands', 'tags'));
    }


}
