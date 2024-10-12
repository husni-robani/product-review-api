<?php

namespace App\Http\Controllers\Api;

use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * This controller method handle the request that want to get the Product data
     */
    public function allProducts() {
        try {
            $products = ProductResource::collection(Product::with('reviews')->get());
            return new ApiResponse(200, $products, 'Get products successful!');
        }catch (\Exception $exception){
            return new ApiResponse(500);
        }
    }

    public function searchProduct(Request $request){
        $query = Product::query();
        if ($request->has('name')){
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        }

        if ($request->has('price')){
            $query->where('price', '=', $request->get('price'));
        }
        try {
            $result = $query->get();
            return new ApiResponse(200, $result);
        }catch (\Exception $exception){
            return new ApiResponse(500);
        }
    }

    public function create(){

    }
}
