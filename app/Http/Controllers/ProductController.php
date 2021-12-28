<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::with('galleries', 'product_categories')->get();

        return view('pages.product.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'qty' => 'required|integer',
            'price' => 'required',
            'images' => 'image',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'qty' => $request->qty,
            'price' => $request->price,
        ]);
        $product->save();

        $p_category = ProductCategory::create([
            'product_id' => $product->id,
            'category_id' => $request->category,
        ]);
        $p_category->save();

        $p_gallery = ProductGallery::create([
            'product_id' => $product->id,
            'images' => $request->file('images')->store('assets/product', 'public'),
        ]);
        $p_gallery->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        $categories = Category::get();
        $gallery = ProductGallery::with('product')->where('product_id', $id)->first();

        return view('pages.product.edit', compact('item', 'categories', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'qty' => 'required|integer',
            'price' => 'required',
            'images' => 'image',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'qty' => $request->qty,
            'price' => $request->price,
        ]);
        $product->save();

        $p_category = ProductCategory::with('product')->where('product_id', $id)->first();
        $p_category->update([
            'category_id' => $request->category,
        ]);
        $p_category->save();

        $p_gallery = ProductGallery::with('product')->where('product_id', $id)->first();
        $p_gallery->update([
            'images' => $request->file('images')->store('assets/product', 'public'),
        ]);
        $p_gallery->save();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products');
    }
}
