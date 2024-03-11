<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
<script src="https://cdn.tailwindcss.com"></script>

@include('organiser.side')

<main class="ml-60 pt-16 max-h-screen overflow-auto">
    <a
        class="mt-6 block absolute right-4 text-white bg-black hover:bg-gray focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        href="/createEvent">
        Add event
    </a>
    <div class="px-6 py-24">
        <div class="mx-auto">
            <div class="max-w-screen-xl p-5 mx-auto dark:bg-gray-800 dark:text-gray-100">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-4 sm:grid-cols-2">
                    @foreach($events as $event)
                        <div
                            class="text-white relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500"
                            style="background-image: url({{$event->image}});">
                            <div
                                class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                            <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-2 mt-3">
                                <a rel="noopener noreferrer" href="#"
                                   class="px-3 py-2 text-lg font-semibold tracki uppercase dark:text-gray-100 bgundefined">{{$event->title}}</a>
                                <div class="flex flex-col justify-start text-center dark:text-gray-100">
                                    <span
                                        class="text-3xl font-semibold leadi tracki">{{ \Carbon\Carbon::parse($event->date)->format('j') }}</span>
                                    <span
                                        class="leadi uppercase">{{ \Carbon\Carbon::parse($event->date)->format('F') }}</span>
                                </div>
                            </div>
                            <h2 class="z-10 p-5">
                                <a rel="noopener noreferrer" href="/description/{{$event->id}}"
                                   class="font-medium text-md hover:underline dark:text-gray-100">{{ Str::limit($event->description, 50) }}</a>

                                <div class="w-full font-bold flex mt-4">
                                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                              d="M12 2a8 8 0 0 1 6.6 12.6l-.1.1-.6.7-5.1 6.2a1 1 0 0 1-1.6 0L6 15.3l-.3-.4-.2-.2v-.2A8 8 0 0 1 11.8 2Zm3 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                              clip-rule="evenodd"/>
                                    </svg>

                                    <div class="">
                                        {{$event->location}}
                                    </div>
                                </div>
                                <div class="right-0 flex space-x-4">
                                    <p>Status: </p>
                                    <p class="underline"> {{$event->status}}</p>
                                </div>
                                <div class="right-0 flex space-x-4">
                                    <p>Reservation type: </p>
                                    <p class="underline"> {{$event->reservation_type}}</p>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // Récupérer tous les éléments avec la classe menuIcon
    const menuIcons = document.querySelectorAll('.menuIcon');

    // Pour chaque icône du menu, ajouter un écouteur d'événement de clic
    menuIcons.forEach((icon) => {
        icon.addEventListener('click', () => {
            // Trouver le menu des options correspondant à l'icône du menu
            const menuOptions = icon.nextElementSibling;

            // Afficher ou masquer le menu des options
            menuOptions.classList.toggle('hidden');
        });
    });
</script>
</body>


