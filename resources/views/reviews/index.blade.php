@extends('layouts.app')
@section('title', 'Reviews')
@section('title-page', 'Reviews')

@section("content")
    <div class="mb-6 mt-10">
        <a type="button" href="{{route('reviews.create')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Add new product
        </a>
    </div>
    <x-review-list :reviews="$reviews"/>
@endsection
