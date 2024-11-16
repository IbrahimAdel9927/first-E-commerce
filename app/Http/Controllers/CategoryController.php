<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name|min:5|max:25',
            'category_description' => 'required|min:5|max:255',
            'category_image' => 'sometimes|image|mimes:jpeg,png,jpg,webp,bmp',
        ]);
        $imgName = null;
        if($request->hasFile('category_image')) {
            $imgExt = $request->category_image->extension();
            $imgName = time() . '.' . $imgExt;
            Storage::put('public/images/categories/' . $imgName, file_get_contents($request->category_image));
        }

        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->category_description,
            'image' => $imgName,
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
        // return redirect()->route('categories.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $request->validate([
            'category_name' => 'required|min:5|max:25',
            'category_description' => 'required|min:5|max:255',
            'category_image' => 'sometimes|image|mimes:jpeg,png,jpg,webp,bmp',
        ]);

        if($request->hasFile('category_image')) {
            if($category->image != null){
                Storage::delete("public/images/categories/$category->image");
            }
            $imgExt = $request->category_image->extension();
            $imgName = time() . '.' . $imgExt;
            Storage::put('public/images/categories/' . $imgName, file_get_contents($request->category_image));
        }
        else {
            $imgName = $category->image;
        }

        $category->update([
            'category_name' => $request->category_name,
            'description' => $request->category_description,
            'image' => $imgName,
        ]);
    
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if($category->image != null){
            Storage::delete("public/images/categories/$category->image");
        }

        $category->delete();
        return redirect()->route('categories.index');
    }
}
