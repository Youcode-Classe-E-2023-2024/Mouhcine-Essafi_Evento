{{--<body class="relative bg-yellow-50 overflow-hidden max-h-screen">--}}
{{--<script src="https://cdn.tailwindcss.com"></script>--}}

{{--@include('organiser.side')--}}
{{--<main class="ml-60 pt-16 max-h-screen overflow-auto">--}}
{{--    <div class="bg-white mx-auto w-11/12">--}}
{{--        <div class="container mx-auto px-4 py-8 flex flex-col">--}}
{{--            <div class="flex flex-wrap -mx-4">--}}
{{--                <div class="w-full lg:w-1/2 px-4 mb-8 lg:mb-0">--}}
{{--                    <img class="rounded-lg shadow-lg" src="{{$event->image}}"--}}
{{--                         alt="Concert Image">--}}
{{--                </div>--}}
{{--                <div class="w-full pl-12 text-justify lg:w-6/12">--}}
{{--                    <div class="flex justify-between mr-8">--}}
{{--                        <h1 class="text-4xl font-bold mb-4">{{$event->title}}</h1>--}}
{{--                        <div class="relative">--}}
{{--                            <svg class="w-6 h-6 text-gray-800 dark:text-white cursor-pointer menuIcon"--}}
{{--                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"--}}
{{--                                 viewBox="0 0 24 24">--}}
{{--                                <path stroke="currentColor" stroke-linecap="round" stroke-width="3"--}}
{{--                                      d="M12 6h0m0 6h0m0 6h0"/>--}}
{{--                            </svg>--}}
{{--                            <div--}}
{{--                                class="hidden absolute top-0 right-0 mt-6 mr-2 flex flex-col font-bold menuOptions">--}}
{{--                                <div class="flex">--}}
{{--                                    <a href="/updateEvent/{{$event->id}}" class="mr-2">Update</a>--}}
{{--                                </div>--}}
{{--                                <form action="/deleteEvent/{{$event->id}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <button type="submit">Delete</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mb-6">--}}
{{--                        <p class="text-xl font-bold ">Date:</p>--}}
{{--                        <p class="text-lg">--}}
{{--                            {{ \Carbon\Carbon::parse($event->date)->format('l, F jS \a\t h:i A') }}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="mb-6">--}}
{{--                        <p class="text-xl font-bold">Location: </p>--}}
{{--                        <p class="text-lg flex">--}}
{{--                            <svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true"--}}
{{--                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">--}}
{{--                                <path fill-rule="evenodd"--}}
{{--                                      d="M12 2a8 8 0 0 1 6.6 12.6l-.1.1-.6.7-5.1 6.2a1 1 0 0 1-1.6 0L6 15.3l-.3-.4-.2-.2v-.2A8 8 0 0 1 11.8 2Zm3 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"--}}
{{--                                      clip-rule="evenodd"/>--}}
{{--                            </svg>--}}
{{--                            {{$event->location}}</p>--}}
{{--                        --}}{{--                        <p class="text-lg">Region de {{$event->location}}</p>--}}
{{--                    </div>--}}
{{--                    <div class="mb-6">--}}
{{--                        <p class="text-xl font-bold">Tickets:</p>--}}
{{--                        <p class="text-lg">Place disponible: {{$event->nbr_place}} place</p>--}}
{{--                        <p class="text-lg">Price: {{$event->price}} DH</p>--}}
{{--                    </div>--}}
{{--                    <button--}}
{{--                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"--}}
{{--                        type="button">--}}
{{--                        Buy Tickets--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <h2 class="font-bold text-2xl mt-4">Event description</h2>--}}
{{--            <p class="mt-2 text-md text-justify">{{$event->description}}</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</main>--}}
{{--<script>--}}
{{--    // Récupérer tous les éléments avec la classe menuIcon--}}
{{--    const menuIcons = document.querySelectorAll('.menuIcon');--}}

{{--    // Pour chaque icône du menu, ajouter un écouteur d'événement de clic--}}
{{--    menuIcons.forEach((icon) => {--}}
{{--        icon.addEventListener('click', () => {--}}
{{--            // Trouver le menu des options correspondant à l'icône du menu--}}
{{--            const menuOptions = icon.nextElementSibling;--}}

{{--            // Afficher ou masquer le menu des options--}}
{{--            menuOptions.classList.toggle('hidden');--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    // Récupérer tous les éléments avec la classe menuIcon--}}
{{--    const menuIcons = document.querySelectorAll('.menuIcon');--}}

{{--    // Pour chaque icône du menu, ajouter un écouteur d'événement de clic--}}
{{--    menuIcons.forEach((icon) => {--}}
{{--        icon.addEventListener('click', () => {--}}
{{--            // Trouver le menu des options correspondant à l'icône du menu--}}
{{--            const menuOptions = icon.nextElementSibling;--}}

{{--            // Afficher ou masquer le menu des options--}}
{{--            menuOptions.classList.toggle('hidden');--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}


{{--</body>--}}


