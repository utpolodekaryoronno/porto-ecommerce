<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view("BackEnd.brands.index", compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('BackEnd.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|unique:brands,name',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // File upload
        $fileName = "";
        if ($request->hasfile('logo')) {
            $fileName = $this->fileUpload($request->file('logo'), 'media/brands/');
        }

        // Insert brand
        Brand::create([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name), // uses your base controller method
            'logo' => $fileName
        ]);

       // return back
        return redirect(route("brands.index"))->with('success', 'Brand Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view("BackEnd.brands.show", compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('BackEnd.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Brand $brand)
    {
        // Validation
        $request->validate([
            'name' => 'required|unique:brands,name,' . $brand->id,
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $fileName = $brand->logo; // keep old logo by default

        // File upload (if new file provided)
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            $oldPath = public_path('media/brands/' . $brand->logo);
            if ($brand->logo && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload new logo
            $fileName = $this->fileUpload($request->file('logo'), 'media/brands/');
        }

        // Update brand
        $brand->update([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'logo' => $fileName,
        ]);

        // Redirect back
        return redirect()->route('brands.index')->with('success', 'Brand Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Brand $brand)
    {
        // Delete logo file if exists
        $logoPath = public_path('media/brands/' . $brand->logo);
        if ($brand->logo && file_exists($logoPath)) {
            unlink($logoPath);
        }

        // Delete brand record
        $brand->delete();

        return back()->with('success', 'Brand Deleted Successfully');
    }

}
