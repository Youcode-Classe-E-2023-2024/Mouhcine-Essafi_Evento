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
                    <li><a href="{{ route('welcome')}}" class="hover:text-gray-200 hover:underline px-4">Home</a></li>
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


    <div class="container mx-auto flex flex-wrap py-6 text-white">
        <!-- Posts Section -->
        <div class="max-w-screen-xl p-5 mx-auto dark:bg-gray-800 dark:text-gray-100">
            @if ($events->isEmpty())
            <p class="text-center text-gray-500 mt-4">No events found.</p>
            @else
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-4 sm:grid-cols-2">
                @foreach($events as $event)
                <form action="{{route('showEvent', ['event_slug' => $event->slug])}}" method="GET">
                    <button type="submit" class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500" style="background-image: url('{{ $event->image }}');">
                        <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                        <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                            <a style="background-color: cornflowerblue" rel="noopener noreferrer" href="#" class="px-3 py-2 text-xs font-semibold tracki uppercase dark:text-gray-100 bgundefined">{{ $event->category }}</a>
                            <div class="flex flex-col justify-start text-center dark:text-gray-100">
                                <span class="text-3xl font-semibold leadi tracki">{{ \Carbon\Carbon::parse($event->date)->format('j') }}</span>
                                <span class="leadi uppercase">{{ \Carbon\Carbon::parse($event->date)->format('F') }}</span>
                            </div>
                        </div>
                        <h2 class="z-10 p-5">
                            <a style="font-size: x-large" rel="noopener noreferrer" href="#" class="font-medium text-md hover:underline dark:text-gray-100">{{ $event->title }}</a>
                        </h2>
                    </button>
                </form>
                @endforeach
            </div>
            @endif
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>