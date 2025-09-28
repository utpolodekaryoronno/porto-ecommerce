<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('BackEnd.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('BackEnd.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validation
        $request->validate([
            'name' => 'required|unique:tags,name',
        ]);

        // Insert tag
        Tag::create([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name), // uses your base controller method
        ]);

       // return back
        return redirect(route("tags.index"))->with('success', 'Tag Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('BackEnd.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('BackEnd.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        // Validation
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id,
        ]);

        // Update tag
        $tag->update([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
        ]);

        // Redirect back
        return redirect()->route('tags.index')->with('success', 'Tag Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag Deleted Successfully');
    }
}
