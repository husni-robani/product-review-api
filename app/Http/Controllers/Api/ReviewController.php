<?php

namespace App\Http\Controllers\Api;

use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreReviewRequest;
use App\Http\Requests\Api\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    /**
     * @param StoreReviewRequest $request
     * @return ApiResponse
     */
    public function store(StoreReviewRequest $request){
        try {
            $review = Review::create($request->validated());
            ReviewResource::includeProduct(true);
            return new ApiResponse(201, new ReviewResource($review), 'Create review successful!');
        }catch (Exception){
            return new ApiResponse(500);
        }
    }

    public function update(UpdateReviewRequest $request, int $reviewId){
        try {
            $review = Review::findOrFail($reviewId);
            if (! $review->update($request->validated())){
                return new ApiResponse(400, errorMessage: 'Review update failed!');
            }
            return new ApiResponse(200, $review, 'Update review successful!');
        }catch (ModelNotFoundException){
            return new ApiResponse(404, errorMessage: 'Review not found!');
        }catch (Exception){
            return new ApiResponse(500);
        }
    }

    public function destroy(Request $request, int $reviewId){
        try{
            $review = Review::findOrFail($reviewId);
            $review->delete();
            return new ApiResponse(200, message: 'Delete review successful!');
        }catch (ModelNotFoundException){
            return new ApiResponse('404', errorMessage: 'Review not found!');
        }catch (Exception){
            return new ApiResponse(500);
        }
    }

}
