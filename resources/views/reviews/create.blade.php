@extends('layouts.app')

@section('title-page', 'Create Review')
@section('title', 'Create Review')
@section('content')
    <form class="max-w-2xl mx-auto rounded-lg shadow-sm p-3" method="post" action="{{route('reviews.store')}}">
        @csrf
        <div class="mb-5">
            <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an product</label>
            <select id="product" name="product_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a product</option>
                @foreach($products as $product)
                    <option value="{{$product['id']}}">{{$product['name']}}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-5">
            <label for="review" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Review</label>
            <textarea name="review_text" rows="5" id="review" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write you review here ...."></textarea>
            @error('review_text')
            <p class="text-xs text-red-600">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
            <input type="number" id="rate" name="rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('rate')
            <p class="text-xs text-red-600">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="w-32 text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Submit
        </button>
    </form>
@endsection
