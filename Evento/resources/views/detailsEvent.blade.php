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
            <form action="{{route('formAddEvent')}}" method="GET">
                <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Add Event
                </button>
            </form>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6 text-black">
        <!-- Posts Section -->
        <main class="mx-auto max-w-6xl px-4 py-8">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row">
                    <div class="w-full lg:w-1/2 lg:pr-8 mb-8 lg:mb-0">
                        <img class="rounded-lg shadow-lg" src="{{$event->image}}" alt="Concert Image">
                    </div>
                    <div class="w-full lg:w-1/2 lg:pl-8">
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="text-4xl font-bold">{{$event->title}}</h1>
                            <div class="relative">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white cursor-pointer menuIcon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M12 6h0m0 6h0m0 6h0"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mb-6">
                            <p class="text-xl font-bold">Date:</p>
                            <p class="text-lg">{{ \Carbon\Carbon::parse($event->date)->format('l, F jS \a\t h:i A') }}</p>
                        </div>
                        <div class="mb-6">
                            <p class="text-xl font-bold">Location:</p>
                            <p class="text-lg flex items-center">
                                <svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2a8 8 0 0 1 6.6 12.6l-.1.1-.6.7-5.1 6.2a1 1 0 0 1-1.6 0L6 15.3l-.3-.4-.2-.2v-.2A8 8 0 0 1 11.8 2Zm3 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">{{$event->location}}</span>
                            </p>
                        </div>
                        <div class="mb-6">
                            <p class="text-xl font-bold">Tickets:</p>
                            <p class="text-lg">Place disponible: {{$event->nbr_place}} place</p>
                            <p class="text-lg">Price: {{$event->price}} DH</p>
                        </div>
                        <div class="flex space-x-5">
                            <form action="/paiement/{{$event->id}}" method="post">
                                @csrf
                                <button type="submit" class=" bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Buy Tickets</button>
                            </form>
                        <form action="{{route('delete_event',['event_id' => $event->id])}}" method="get">
                            @csrf
                            <button type="submit" class=" bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete Event</button>
                        </form>
                        <form action="{{route('formUpdateEvent',['event_id' => $event->id])}}" method="get">
                            @csrf
                            <button type="submit" class=" bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Update Event</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto px-4 py-8">
                    <h2 class="font-bold text-2xl mb-4">Event Description</h2>
                    <p class="text-lg text-justify">{{$event->description}}</p>
                </div>
            </div>
        </main>
        
    </div>
    

    <footer class="w-full border-t bg-white pb-12">
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
</body>

</html>