<?php

namespace App\Http\Controllers\Api;

use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * This controller method handle the request that want to get the Product data
     * @return ApiResponse
     */
    public function allProducts(Request $request) {
        try {
            $products = ProductResource::collection(Product::with('reviews')->get());
            return new ApiResponse(200, $products, 'Get products successful!');
        }catch (Exception){
            return new ApiResponse(500);
        }
    }


    /**
     * Search product from query string request
     * @return ApiResponse
     */
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
            return new ApiResponse(200, ProductResource::collection($result));
        }catch (Exception){
            return new ApiResponse(500);
        }
    }

    /**
     * This function will create new product
     * @return ApiResponse
     */
    public function store(StoreProductRequest $request){
        try {
            $product = Product::create($request->validated());
            return new ApiResponse(201, new ProductResource($product), 'Create product successful!');
        }catch (Exception){
            return new ApiResponse(500);
        }
    }

    /**
     * This function will updating the selected product
     * @return ApiResponse
     */
    public function update(UpdateProductRequest $request, $productId){
        try {
            $product = Product::findOrFail($productId);
            if (! $product->update($request->validated())){
                return new ApiResponse(400, errorMessage: 'Product update failed!');
            }
            return new ApiResponse(200, $product, 'Update product successful!');
        }catch (ModelNotFoundException){
            return new ApiResponse(404, errorMessage: 'Product not found!');
        }
        catch (Exception){
            return new ApiResponse(500);
        }
    }

    /**
     * @return ApiResponse
     */
    public function destroy(Request $request, $productId){
        try {
            $product = Product::findOrFail($productId);
            $product->delete();
            return new ApiResponse(200, message: "Delete product successful");
        }catch (ModelNotFoundException){
            return new ApiResponse(404, errorMessage: 'Product not found!');
        }catch (Exception){
            return new ApiResponse(500);
        }
    }
}
