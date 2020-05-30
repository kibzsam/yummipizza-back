<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    //
    public function index()
    {
        return Product::all();
    }
    public function show(Product $product)
    {
        return $product;
    }
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
    public function addProduct(Request $request)
    {
        $request->validate([
            'product_image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);
        if ($request->product_image) {
            $image = $request->file('product_image');
            $imageName = $image->getClientOriginalName();
            $destinationPath = storage_path() . '/images/';
            $image->move($destinationPath, $imageName);
            $url = asset('images/' . $imageName);
        }
        $insertArr = [
            'title' => $request->title,
            'description' => $request->description,
            'product_image' => $url,
            'price' => $request->price,
        ];

        Product::insert($insertArr);
    }
    public function createProduct()
    {
        return view('products');
    }
}
