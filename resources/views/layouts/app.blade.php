<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <div class="flex items-center lg:order-2">
                <a href="{{route('logout')}}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log out</a>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{route('products')}}" class="block py-2 pr-4 pl-3 {{ Request::routeIs('products') ? 'text-primary-700 dark:text-white' : 'text-gray-700 dark:text-gray-400' }} border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Product</a>
                    </li>
                    <li>
                        <a href="/reviews" class="block py-2 pr-4 pl-3 {{ Request::routeIs('reviews') ? 'text-primary-700 dark:text-white' : 'text-gray-700 dark:text-gray-400' }} border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Review</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Main content section -->
<main class="p-6 bg-white rounded-lg shadow-md max-w-screen-xl mx-auto mt-6 mb-10">
    <!-- Add your main content here -->
    <h1 class="text-2xl font-bold mb-4">@yield('title-page')</h1>
    @yield('content')
</main>

</body>
</html>
