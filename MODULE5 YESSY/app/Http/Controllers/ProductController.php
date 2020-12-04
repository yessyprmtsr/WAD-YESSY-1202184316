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
        $products = new Product();
        $products->name = $request->input('name');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->stock = $request->input('stock');
        if($request->hasFile('img_path')){
            $file = $request->file('img_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/image/',$filename);
            $products->img_path = $filename;
        } else {
            return $request;
            $products->img_path = "";
        }
        $products->save();
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
   
     $products = Product::find($id);
     $products->name = $request->name;
     $products->price = $request->price;
     $products->description = $request->description;
     $products->stock = $request->stock;
     if($request->hasFile('img_path')){
        $file = $request->file('img_path');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . "." . $extension;
        $file->move('uploads/image/',$filename);
        $products->img_path = $filename;
    } else {
        return $request;
        $products->img_path = "";
    }
     $products->save();

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
