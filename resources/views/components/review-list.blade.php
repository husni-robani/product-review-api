<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Review
            </th>
            <th scope="col" class="px-6 py-3">
                Rating
            </th>
            <th scope="col" class="px-6 py-3">
                Product
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$review['review_text']}}
                </th>
                <td class="px-6 py-4">
                    {{$review['rate']}} / 5
                </td>
                <td class="px-6 py-4">
                    {{$review['product_name']}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-around">
                        <a href="{{route('reviews.edit', ['reviewId' => $review['id']])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form action="{{route('reviews.destroy', ['reviewId' => $review['id']])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure')" class="text-red-600 font-medium ">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
