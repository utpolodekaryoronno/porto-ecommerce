<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('BackEnd.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::latest()->get();
        $tags = Tag::latest()->get();
        $categories = Category::latest()->get();

        return view('BackEnd.product.create', compact('brands', 'tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|unique:products,name',
            'subtitle' => 'required|max:255',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'stock' => 'required|numeric',
            'rating' => 'nullable|numeric|max:5',
            'brand' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'tags' => 'nullable',
            'short_desc' => 'nullable',
            'long_desc' => 'nullable',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg|max:4096',
        ]);

        // store data
        $product = Product::create([
            'name'          => $request->name,
            'slug'          => $this->makeSlug($request->name),
            'subtitle'      => $request->subtitle,
            'regular_price' => $request->regular_price,
            'sale_price'    => $request->sale_price,
            'stock'         => $request->stock,
            'rating'         => 5,
            'brand_id'      => $request->brand,
            'short_desc'    => $request->short_desc,
            'long_desc'     => $request->long_desc,
            // 'category_id'   => $request->categories,
            // 'tag_id'        => $request->tags,
        ]);

        // Gallery File upload
        foreach($request->file('gallery') as $item) {
            $fileName = $this->fileUpload($item, 'media/product/');
            Gallery::create([
                'product_id' => $product->id,
                'file_name'  => $fileName,
            ]);
        }

        // Many to Many relationship attach with category
        $product->categories()->attach($request->categories);

        // Many to Many relationship attach with tag
        $product->tags()->attach($request->tags);


        return redirect()->route('product.index')->with('success', 'Product created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // kon product ar under a kon gallery, brand, categories, tags ase shegula dekhano jabe

        // return $product->gallery;
        // return $product->load('gallery');
        // return $product->brand;
        // return $product->categories;
        // return $product->tags;

        // return $product->load('gallery', 'brand', 'categories', 'tags');

        return view('BackEnd.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('BackEnd.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // validation
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'subtitle' => 'required|max:255',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'short_desc' => 'nullable',
            'long_desc' => 'nullable',
        ]);

        // Update data
        $product ->update([
            'name'          => $request->name,
            'slug'          => $this->makeSlug($request->name),
            'subtitle'      => $request->subtitle,
            'regular_price' => $request->regular_price,
            'sale_price'    => $request->sale_price,
            'short_desc'    => $request->short_desc,
            'long_desc'     => $request->long_desc,
        ]);

        // return
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
        {
        // Delete all gallery images (from storage + DB)
        if ($product->gallery && $product->gallery->count() > 0) {
            foreach ($product->gallery as $image) {
                $filePath = public_path('media/product/' . $image->file_name);
                if (file_exists($filePath)) {
                    unlink($filePath); // delete image from folder
                }
                $image->delete(); // delete record from DB
            }
        }

        // Delete main product image if exists
        if ($product->image && file_exists(public_path('media/product/' . $product->image))) {
            unlink(public_path('media/product/' . $product->image));
        }

        // delete product
        $product->delete();

        //return back with success message
        return back()->with('success', 'Product $ gallery deleted successfully!');
    }


}
