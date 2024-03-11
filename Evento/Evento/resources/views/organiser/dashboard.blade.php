<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
<script src="https://cdn.tailwindcss.com"></script>

@include('organiser.side')

<main class="ml-60 pt-16 max-h-screen overflow-auto">
    <div class="px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl p-8 mb-5">
                <h1 class="text-3xl text-center font-bold mb-10">
                    Welcome Organizer {{ auth()->user()->name }}
                </h1>
{{--                <div class="flex items-center justify-between">--}}
{{--                    <div class="flex items-stretch">--}}
{{--                        <div class="text-gray-400 text-xs">Members<br>connected</div>--}}
{{--                        <div class="h-100 border-l mx-4"></div>--}}
{{--                        <div class="flex flex-nowrap -space-x-3">--}}
{{--                            <div class="h-9 w-9">--}}
{{--                                <img class="object-cover w-full h-full rounded-full"--}}
{{--                                     src="https://ui-avatars.com/api/?background=random">--}}
{{--                            </div>--}}
{{--                            <div class="h-9 w-9">--}}
{{--                                <img class="object-cover w-full h-full rounded-full"--}}
{{--                                     src="https://ui-avatars.com/api/?background=random">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="flex items-center gap-x-2">--}}
{{--                        <button type="button"--}}
{{--                                class="inline-flex items-center justify-center h-9 px-3 rounded-xl border hover:border-gray-400 text-gray-800 hover:text-gray-900 transition">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"--}}
{{--                                 class="bi bi-chat-fill" viewBox="0 0 16 16">--}}
{{--                                <path--}}
{{--                                    d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                        <button type="button"--}}
{{--                                class="inline-flex items-center justify-center h-9 px-5 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">--}}
{{--                            Open--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <hr class="my-10">

                <div class="grid grid-cols-2 gap-x-20">
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Dashboard</h2>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <div class="p-4 bg-green-100 rounded-xl">
                                    <div class="font-bold text-xl text-gray-800 leading-none">Good day,
                                        <br>{{ auth()->user()->name }}
                                    </div>
                                    <div class="mt-5">
                                        <a href="/createEvent"
                                           class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition">
                                            Start to post events
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                                <div class="font-bold text-2xl leading-none">{{$totalEvents}}</div>
                                <div class="mt-2">Total Events</div>
                            </div>
                            <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                                <div class="font-bold text-2xl leading-none">{{$publicEvents}}</div>
                                <div class="mt-2">Public Posts</div>
                            </div>
                            <div class="col-span-2">
                                <div class="p-4 bg-purple-100 rounded-xl text-gray-800">
                                    <div class="font-bold text-xl leading-none">Your daily plan</div>
                                    <div class="mt-2">5 of 8 completed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-4">My latest Events</h2>

                        <div class="space-y-4">
                            @foreach($LatestEvents as $event)
                                <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                                    <div class="flex justify-between">
                                        <div class="text-gray-400 text-xs">{{$event->location}}</div>
                                        <div class="text-gray-400 text-xs">{{$event->price}} DH</div>
                                    </div>
                                    <a href="javascript:void(0)"
                                       class="font-bold hover:text-yellow-800 hover:underline">{{$event->title}}</a>
                                    <div class="text-sm text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor"
                                             class="text-gray-800 inline align-middle mr-1" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                        Nombre de places: {{$event->nbr_place}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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


