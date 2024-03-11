<script src="https://cdn.tailwindcss.com"></script>

<!-- component -->
<!-- Create By Joker Banny -->
<body class="bg-white px-12">
<header>
    @include('side')
</header>
<main class="py-16 container mx-auto px-6 md:px-0">
    <div class="bg-white mx-auto w-11/12">
        <div class="container mx-auto px-4 py-8 flex flex-col">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-1/2 px-4 mb-8 lg:mb-0">
                    <img class="rounded-lg shadow-lg" src="{{$event->image}}"
                         alt="Concert Image">
                </div>
                <div class="w-full pl-12 text-justify lg:w-6/12">
                    <div class="flex justify-between mr-8">
                        <h1 class="text-4xl font-bold mb-4">{{$event->title}}</h1>
                    </div>
                    <div class="mb-6">
                        <p class="text-xl font-bold ">Date:</p>
                        <p class="text-lg">
                            {{ \Carbon\Carbon::parse($event->date)->format('l, F jS \a\t h:i A') }}
                        </p>
                    </div>
                    <div class="mb-6">
                        <p class="text-xl font-bold">Location: </p>
                        <p class="text-lg flex">
                            <svg class="w-6 h-6 text-black dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M12 2a8 8 0 0 1 6.6 12.6l-.1.1-.6.7-5.1 6.2a1 1 0 0 1-1.6 0L6 15.3l-.3-.4-.2-.2v-.2A8 8 0 0 1 11.8 2Zm3 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                      clip-rule="evenodd"/>
                            </svg>
                            {{$event->location}}</p>
                        {{--                        <p class="text-lg">Region de {{$event->location}}</p>--}}
                    </div>
                    <div class="mb-6">
                        <p class="text-xl font-bold">Tickets:</p>
{{--                        <p class="text-lg">Category: {{ $event->category->name }}</p>--}}
                        <p class="text-lg">Place disponible: {{$event->nbr_place}} place</p>
                        <p class="text-lg">Price: {{$event->price}} DH</p>
                    </div>
                    <div class="flex space-x-2">
                        <form action="/paiement/{{$event->id}}" method="post">
                            @csrf
                            <button
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Buy Now !
                            </button>
                        </form>
                        @if (auth()->check() && auth()->user()->hasRole('organizer'))
                            <a href="/updateEvent/{{$event->id}}"
                               class="bg-green-500 h-11 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Edit Ticket
                            </a>
                            <form action="/deleteEvent/{{$event->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Delete Ticket
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <h2 class="font-bold text-2xl mt-4">Event description</h2>
            <p class="mt-2 text-md text-justify">{{$event->description}}</p>
        </div>
    </div>

</main>
<footer class="mb-6 px-6 md:px-0">
    <hr>
    <div class="grid gap-5 p-4 grid-cols-5 container mx-auto space-x-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-500">saunatime</h1>
            <p>The largest online community to rent saunas in Finland.</p>
            <spa>© Sharetribe 2017.</spa>
        </div>
        <div class="pt-2">
            <ul>
                <li>Add your sauna</li>
                <li>About us</li>
                <li>F.A.Q</li>
                <li>Help</li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="pt-2">
            <ul>
                <li>Helsinki</li>
                <li>Espoo</li>
                <li>Ruka</li>
                <li>Tampere</li>
                <li>Turku</li>
            </ul>
        </div>
        <div class="pt-2">
            <ul>
                <li>Kuopio</li>
                <li>Mikkeli</li>
                <li>Espoo</li>
                <li>Vantaa</li>
                <li>Ahvenanmaa</li>
            </ul>
        </div>
        <div class="pt-2">
            <div>
                <div class="flex space-x-4 text-gray-500 text-center">
            <span
            ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg
                ></span>
                    <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg
                        ></span>
                    <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z"/></svg
                        ></span>
                </div>
                <div class="flex mt-12">
                    <p>Privacy & Cookies</p>
                    <p>Terms of use</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@if(Session::has('info'))
    <div id="alert-message"
         class="w-1/2 left-1/2 bg-blue-100 border bottom-2/4 border-blue-400 text-blue-700 px-4 py-3 rounded relative"
         role="alert">
        <strong class="font-bold">Info:</strong>
        <span class="block sm:inline">{{ Session::get('info') }}</span>
        <span id="close-alert" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
            <svg class="fill-current h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path fill-rule="evenodd"
                      d="M14.354 5.354a2 2 0 00-2.828 0L10 7.172 7.172 5.354a2 2 0 00-2.828 2.828L7.172 10 5.354 12.828a2 2 0 102.828 2.828L10 12.828l2.828 2.828a2 2 0 102.828-2.828L12.828 10l2.828-2.828a2 2 0 000-2.828z"
                      clip-rule="evenodd"/>
            </svg>
        </span>
    </div>
@endif

@if(Session::has('success'))
    <div id="alert-message"
         class="w-1/2 left-1/2 bg-blue-100 border bottom-2/4 border-blue-400 text-blue-700 px-4 py-3 rounded relative"
         role="alert">
        <strong class="font-bold">Info:</strong>
        <span class="block sm:inline">{{ Session::get('success') }}</span>
        <span id="close-alert" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
            <svg class="fill-current h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path fill-rule="evenodd"
                      d="M14.354 5.354a2 2 0 00-2.828 0L10 7.172 7.172 5.354a2 2 0 00-2.828 2.828L7.172 10 5.354 12.828a2 2 0 102.828 2.828L10 12.828l2.828 2.828a2 2 0 102.828-2.828L12.828 10l2.828-2.828a2 2 0 000-2.828z"
                      clip-rule="evenodd"/>
            </svg>
        </span>
    </div>
@endif

