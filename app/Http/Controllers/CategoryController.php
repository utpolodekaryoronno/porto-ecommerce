<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view("BackEnd.category.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('BackEnd.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation
        $request->validate([
            'name' => 'required|unique:categories,name',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:3072',
        ]);

        // File upload
        $fileName = "";
        if ($request->hasfile('photo')) {
            $fileName = $this->fileUpload($request->file('photo'), 'media/category/');
        }

        // Insert Category
        Category::create([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name), // uses your base controller method
            'photo' => $fileName
        ]);

       // return back
        return redirect(route("category.index"))->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('BackEnd.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('BackEnd.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         // Validation
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $fileName = $category->photo; // keep old photo by default

        // File upload (if new file provided)
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            $oldPath = public_path('media/category/' . $category->photo);
            if ($category->photo && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload new photo
            $fileName = $this->fileUpload($request->file('photo'), 'media/category/');
        }

        // Update category
        $category->update([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'photo' => $fileName,
        ]);

        // Redirect back
        return redirect()->route('category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         // Delete photo file if exists
        $photoPath = public_path('media/category/' . $category->photo);
        if ($category->photo && file_exists($photoPath)) {
            unlink($photoPath);
        }

        // Delete category record
        $category->delete();

        return back()->with('success', 'Category Deleted Successfully');
    }
}
