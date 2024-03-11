<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Blog Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Shop</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li><a href="{{ route('AllEvento')}}" class="hover:text-gray-200 hover:underline px-4">Evento</a></li>
                    <li><a href="{{ url('/dashboard') }}" class="hover:text-gray-200 hover:underline px-4">Dashboard</a></li>
                    @else
                    <li><a href="{{ route('login') }}" class="hover:text-gray-200 hover:underline px-4">Log in</a></li>

                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="hover:text-gray-200 hover:underline px-4">Register</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Evento
            </a>
            <p class="text-lg text-gray-600">
                Creating Moments to Remember
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#" class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center" @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                @foreach ($categories as $category)
                <a href="{{route('EventsWithCategory',['category' => $category->name])}}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
    </nav>

    <div class="container mx-auto flex flex-wrap py-6 text-white">

        <!-- Posts Section -->
        <div class="max-w-screen-xl p-5 mx-auto dark:bg-gray-800 dark:text-gray-100">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 md:gap-0 lg:grid-rows-2">
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover cursor-pointer h-96 md:col-span-2 lg:row-span-2 lg:h-full group dark:bg-gray-500" style="background-image: url(https://source.unsplash.com/random/245x320);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a style="background-color: cornflowerblue" rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase hover:underline dark:text-gray-100 dark:bg-violet-400">Art</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">31</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" style="font-size: xxx-large" class="font-medium text-md group-hover:underline lg:text-2xl lg:font-semibold dark:text-gray-100">Fuga ea ullam earum assumenda, beatae labore eligendi.</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover cursor-pointer h-96 group dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/240x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a style="background-color: cornflowerblue" rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase hover:underline dark:text-gray-100 dark:bg-violet-400">Politics</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">04</span>
                            <span class="leadi uppercase">Aug</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a style="font-size: x-large" rel="noopener noreferrer" href="#" class="font-medium text-md group-hover:underline dark:text-gray-100"> Autem sunt tempora mollitia magnam non voluptates</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover cursor-pointer h-96 group dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/241x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a style="background-color: cornflowerblue" rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase hover:underline dark:text-gray-100 dark:bg-violet-400">Health</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">01</span>
                            <span class="leadi uppercase">Aug</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a style="font-size: x-large" rel="noopener noreferrer" href="#" class="font-medium text-md group-hover:underline dark:text-gray-100">Inventore reiciendis aliquam excepturi</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover cursor-pointer h-96 group dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/242x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase hover:underline dark:text-gray-100 dark:bg-violet-400">Science</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">28</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md group-hover:underline dark:text-gray-100">Officiis mollitia dignissimos commodi optio vero animi</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover cursor-pointer h-96 group dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/243x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase hover:underline dark:text-gray-100 dark:bg-violet-400">Sports</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">19</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md group-hover:underline dark:text-gray-100">Doloribus sit illo necessitatibus architecto exercitationem enim</a>
                    </h2>
                </div>
            </div>
        </div>
        <div class="max-w-screen-xl p-5 mx-auto dark:bg-gray-800 dark:text-gray-100">
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-4 sm:grid-cols-2">
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/240x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Politics</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">04</span>
                            <span class="leadi uppercase">Aug</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100"> Autem sunt tempora mollitia magnam non voluptates</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/241x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Health</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">01</span>
                            <span class="leadi uppercase">Aug</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Inventore reiciendis aliquam excepturi</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/242x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Science</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">28</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Officiis mollitia dignissimos commodi optio vero animi</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/243x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Sports</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">19</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Doloribus sit illo necessitatibus architecto exercitationem enim</a>
                    </h2>
                </div>
            </div>
        </div>
        <div class="max-w-screen-xl p-5 mx-auto dark:bg-gray-800 dark:text-gray-100">
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-4 sm:grid-cols-2">
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/240x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Politics</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">04</span>
                            <span class="leadi uppercase">Aug</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100"> Autem sunt tempora mollitia magnam non voluptates</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/241x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Health</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">01</span>
                            <span class="leadi uppercase">Aug</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Inventore reiciendis aliquam excepturi</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/242x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Science</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">28</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Officiis mollitia dignissimos commodi optio vero animi</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/243x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Sports</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">19</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Doloribus sit illo necessitatibus architecto exercitationem enim</a>
                    </h2>
                </div>
            </div>
        </div>
        <div class="max-w-screen-xl p-5 mx-auto dark:bg-gray-800 dark:text-gray-100">
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-4 sm:grid-cols-2">
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/240x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Politics</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">04</span>
                            <span class="leadi uppercase">Aug</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100"> Autem sunt tempora mollitia magnam non voluptates</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/241x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Health</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">01</span>
                            <span class="leadi uppercase">Aug</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Inventore reiciendis aliquam excepturi</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/242x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Science</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">28</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Officiis mollitia dignissimos commodi optio vero animi</a>
                    </h2>
                </div>
                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url(&quot;https://source.unsplash.com/random/243x320&quot;);">
                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                        <a rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">Sports</a>
                        <div class="flex flex-col justify-start text-center dark:text-gray-100">
                            <span class="text-3xl font-semibold leadi tracki">19</span>
                            <span class="leadi uppercase">Jul</span>
                        </div>
                    </div>
                    <h2 class="z-10 p-5">
                        <a rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">Doloribus sit illo necessitatibus architecto exercitationem enim</a>
                    </h2>
                </div>
            </div>
        </div>
        {{-- <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on April 25th, 2020
                    </p>
                    <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=2">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Automotive, Finance</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on January 12th, 2020
                    </p>
                    <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=3">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Sports</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on October 22nd, 2019
                    </p>
                    <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <!-- Pagination -->
            <div class="flex items-center py-8">
                <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                </div>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
                </a>
            </div>

        </aside> --}}

    </div>
     <!-- Pagination -->
            <div class="flex items-center py-8 px-44">
                <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
            </div>
    <footer class="w-full border-t bg-white pb-12">
        <div class="relative w-full flex items-center invisible md:visible md:pb-12" x-data="getCarouselData()">
            <button class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12" x-on:click="decrement()">
                &#8592;
            </button>
            <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
                <img class="w-1/6 hover:opacity-75" :src="image">
            </template>
            <button class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12" x-on:click="increment()">
                &#8594;
            </button>
        </div>
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; myblog.com</div>
        </div>
    </footer>

    <script>
        function getCarouselData() {
            return {
                currentIndex: 0,
                images: [
                    'https://source.unsplash.com/collection/1346951/800x800?sig=1',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=2',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=3',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=4',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=5',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=6',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=7',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=8',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=9',
                ],
                increment() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
                },
                decrement() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
                },
            }
        }
    </script>

</body>

</html>