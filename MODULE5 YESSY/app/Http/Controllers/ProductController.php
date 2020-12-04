<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('template.product.product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.product.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'img_path' => 'file|image',
        ]);
        if($request->hasFile('img_path')){
            $cover = $request->file('img_path')->store('public/images');
         }
         Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'img_path' => $cover,
        ]);
        return redirect()->route('products.index')->withSuccess('Products data has been saved');
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
        $products = Product::findOrFail($id);
        return view ('template.product.edit_product', ['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products, $id)
    {
    //simpan gambar
    $this->validate($request,[
        'img_path' => 'file|image',
    ]);
    $cover = $products->cover;
    if($request->hasFile('img_path')){
        $cover = $request->file('img_path')->store('public/images');
     }
     $products = Product::find($id);
     $products->name = $request->name;
     $products->price = $request->price;
     $products->description = $request->description;
     $products->stock = $request->stock;
     $products->img_path = $cover;
     $products->save();


    // $products->update([
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'description' => $request->description,
    //         'stock' => $request->stock,
    //         'img_path' => $cover,
    // ]);
    return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index')
            ->withDanger('delete', 'Data has been deleted');
    }
}
