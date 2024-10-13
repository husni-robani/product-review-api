<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('products.index', compact("products"));
    }

    public function create(){
        return view('products.create');
    }

    public function store(StoreProductRequest $request){
        Product::create($request->validated());
        return redirect(route('products'));
    }

    public function edit(Request $request, $productApi){
        $product = Product::findOrFail($productApi);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(UpdateProductRequest $request, $productId){
        $product = Product::findOrFail($productId);
        $product->update($request->validated());
        return redirect(route('products'));
    }

    public function destroy($productId){
        $product = Product::findOrFail($productId);
        $product->delete();
        return redirect(route('products'));
    }
}
