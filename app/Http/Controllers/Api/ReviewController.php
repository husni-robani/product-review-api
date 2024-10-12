<?php

namespace App\Http\Controllers\Api;

use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Get all reviews with its product information
     * @return ApiResponse
     */
    public function allReviews(){
        try {
            ReviewResource::includeProduct(true);
            $reviews = ReviewResource::collection(Review::with('product')->get());
            return new ApiResponse(200, $reviews, 'Get all reviews successful');
        }catch (Exception){
            return new ApiResponse(500);
        }
    }

    /**
     * @return ApiResponse
     */
    public function searchReview(Request $request){
        $query = Review::query();
        if ($request->has('review_text')){
            $query->where('review_text', 'like', '%' . $request->get('review_text') . '%');
        }
        if ($request->has('rating')){
            $query->where('rate', '=', $request->get('rating'));
        }
        try {
            ReviewResource::includeProduct(true);
            $reviews = ReviewResource::collection($query->get());
            return new ApiResponse(200, $reviews, 'Search reviews successful!');
        }catch (Exception){
            return new ApiResponse(500);
        }
    }


}
