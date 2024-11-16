<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(10);
        $categories=Category::all();
        return view('admin.products.index',compact('products', 'categories'));
    }

    public function productsByCategory(string $id)
    {
        $products=Product::where('category_id', $id)->paginate(10);
        $categories=Category::all();
        return view('admin.products.index',compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:categories,category_name|min:5|max:25',
            'product_description' => 'required|min:5|max:255',
            'product_price' => 'required|numeric|min:0|max:99999.99',
            'product_image' => 'sometimes|image|mimes:jpeg,png,jpg,webp,bmp',
            'category_id' => 'required|exists:categories,id',
        ]);
        $imgName = null;
        if($request->hasFile('product_image')) {
            $imgExt = $request->product_image->extension();
            $imgName = time() . '.' . $imgExt;
            Storage::put('public/images/products/' . $imgName, file_get_contents($request->product_image));
        }

        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->product_description,
            'price' => $request->product_price,
            'image' => $imgName,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('adminproducts.index')->withErrors([
            'error' => 'Product is not created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = product::find($id);
        $request->validate([
            'product_name' => 'required|min:5|max:25',
            'product_description' => 'required|min:5|max:255',
            'product_price' => 'required|numeric|min:0|max:99999.99',
            'product_image' => 'sometimes|image|mimes:jpeg,png,jpg,webp,bmp',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($request->hasFile('product_image')) {
            if($product->image != null){
                Storage::delete("public/images/products/$product->image");
            }
            $imgExt = $request->product_image->extension();
            $imgName = time() . '.' . $imgExt;
            Storage::put('public/images/products/' . $imgName, file_get_contents($request->product_image));
        }
        else {
            $imgName = $product->image;
        }

        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->product_description,
            'price' => $request->product_price,
            'image' => $imgName,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('adminproducts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if($product->image != null){
            Storage::delete("public/images/products/$product->image");
        }

        $product->delete();
        return redirect()->route('adminproducts.index');
    }
}
