<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(10);
        $categories=Category::all();
        return view('user.products.index',compact('products', 'categories'));
    }

    public function productsByCategory(string $id)
    {
        $products=Product::where('category_id', $id)->paginate(10);
        $categories=Category::all();
        return view('user.products.index',compact('products', 'categories'));
    }

    public function searchProductByName(Request $request)
    {
        if($request->q == ''){
            return redirect()->route('products.index');
        }
        $products = Product::where('product_name', 'like', "%$request->q%")->paginate(10);
        $categories = Category::all();
        return view('user.products.index',compact('products', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
