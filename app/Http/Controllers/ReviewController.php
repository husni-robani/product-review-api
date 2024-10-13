<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::with('product')->get()->map(function ($review){
            return [
                'review_text' => $review->review_text,
                'rate' => $review->rate,
                'id' => $review->id,
                'product_name' => $review->product->name
            ];
        });
        return view('reviews.index', [
            'reviews' => $reviews
        ]);
    }

    public function create(){
        $products = Product::all()->map(function ($product){
            return [
                'name' => $product->name,
                'id' => $product->id
            ];
        });
        return view('reviews.create', [
            'products' => $products
        ]);
    }

    public function store(StoreReviewRequest $request){
        Review::create($request->validated());
        return redirect(route('reviews'));
    }

    public function edit($reviewId){
        $review = Review::with('product')->findOrFail($reviewId)->toArray();
        return view('reviews.edit', ['review' => $review]);
    }

    public function update(UpdateReviewRequest $request, $reviewId){
        $review = Review::findOrFail($reviewId);
        $review->update($request->validated());
        return redirect(route('reviews'));
    }

    public function destroy($reviewId){
        $review = Review::findOrFail($reviewId);
        $review->delete();
        return redirect(route('reviews'));
    }
}
