@extends('layouts.app')

@section('title-page', 'Create Review')
@section('title', 'Create Review')
@section('content')
    <form class="max-w-2xl mx-auto rounded-lg shadow-sm p-3" method="post" action="{{route('reviews.update', ['reviewId' => $review['id']])}}">
        @csrf
        @method('PATCH')
        <div class="mb-5">
            <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product</label>
            <input type="text" id="disabled-input" aria-label="disabled input" class="mb-5 bg-gray-100 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$review['product']['name']}}" disabled>
        </div>
        <div class="mb-5">
            <label for="review" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Review</label>
            <textarea name="review_text" rows="5" id="review" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write you review here ....">{{$review['review_text']}}</textarea>
            @error('review_text')
            <p class="text-xs text-red-600">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
            <input value="{{$review['rate']}}" type="number" id="rate" name="rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('rate')
            <p class="text-xs text-red-600">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="w-32 text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Submit
        </button>
    </form>
@endsection
