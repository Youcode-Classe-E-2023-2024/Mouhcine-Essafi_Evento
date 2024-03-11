{{--testtttttttttttttttt--}}


{{--<form action="{{ route('logout') }}" method="POST">--}}
{{--    @csrf--}}
{{--    <button type="submit">Logout</button>--}}
{{--</form>--}}

<script src="https://cdn.tailwindcss.com"></script>

<!-- component -->
<!-- Create By Joker Banny -->
<body class="bg-white px-12">
<header>
    @include('side')
    <!-- component -->
    <div class="flex justify-between mx-auto p-2.5 flex rounded-full bg-[#0d1829] px-2 w-full ">+
        <div class="flex justify-between mx-auto text-gray-400 space-x-8">
            @foreach($categories as $category)
                <a href="/filter/{{$category->name}}" class="text-gray-200 hover:text-gray-500 hover:text-gray-200">{{$category->name}}</a>
            @endforeach
        </div>
    </div>

    <!-- Section Hero -->
    {{--    <div class="container mt-4 mx-auto bg-gray-400 h-96 rounded-md flex items-center">--}}
    {{--        <div class="sm:ml-20 text-gray-50 text-center sm:text-left">--}}
    {{--            <h1 class="text-5xl font-bold mb-4">--}}
    {{--                Book saunas <br/>--}}
    {{--                everywhere.--}}
    {{--            </h1>--}}
    {{--            <p class="text-lg inline-block sm:block">The largest online community to rent saunas in Finland.</p>--}}
    {{--            <button class="mt-8 px-4 py-2 bg-gray-600 rounded">Browse saunas</button>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <div id="default-carousel" class="mt-4 relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            @foreach($LatestEvents as $event)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div
                        class="text-white relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-gray-500"
                        style="background-image: url({{$event->image}});">
                        <div
                            class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-gray-900 dark:to-gray-900"></div>
                        <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-2">
                            <a rel="noopener noreferrer" href="#"
                               class="px-3 text-xl font-semibold tracki uppercase dark:text-gray-100 bgundefined">{{$event->title}}</a>
                            <div class="flex flex-col justify-start text-center dark:text-gray-100 p-4">
                                    <span
                                        class="text-4xl font-semibold leadi tracki">{{ \Carbon\Carbon::parse($event->date)->format('j') }}</span>
                                <span
                                    class="leading text-xl uppercase">{{ \Carbon\Carbon::parse($event->date)->format('F') }}</span>
                            </div>
                        </div>
                        <h2 class="z-10 p-5">
                            <a rel="noopener noreferrer" href="/description/{{$event->id}}"
                               class="font-medium text-lg hover:underline dark:text-gray-100">{{ Str::limit($event->description, 50) }}</a>

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
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
        </button>
        <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
        </button>
    </div>
</header>
{{--all events--}}
<main class="py-16 container mx-auto px-6 md:px-0">
    <section>
        <h1 class="text-3xl font-bold text-gray-600 mb-10">Explore exotic locations in Finland</h1>
        <div class="grid sm:grid-cols-3 gap-4 grid-cols-2">
            @if (count($events) > 0)
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
                    </div>

                @endforeach
            @else
                <p>Résultat non trouvé.</p>
            @endif

            <div class="pt-4">
                {{$events->links()}}
            </div>

        </div>
        <hr class="w-40 my-14 border-4 rounded-md sm:mx-0 mx-auto"/>
    </section>
    <section>
        <h1 class="inline-block text-gray-600 font-bold text-3xl">
            The holy sauna ritual <br/>
            (or how does Saunatime work).
        </h1>

        <div class="grid grid-cols-3 gap-4 mt-10">
            <div>
                <h3 class="text-lg font-semibold text-gray-500 mt-2">1. Browse and book</h3>
                <p class="text text-gray-400">Start by searching for a location. Once you find a sauna you like, simply
                    check the availability, book it, and make a secure payment right away.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-500 mt-2">2. Have a great bath</h3>
                <p class="text text-gray-400">Meet your host on the date you chose and enjoy the home sauna experience.
                    We'll handle the payment to the host after your experience.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-500 mt-2">3. Review the host</h3>
                <p class="text text-gray-400">If you enjoyed the experience, let others know by giving a review to your
                    sauna host. This way others will know where to go.</p>
            </div>
        </div>
    </section>
    <div class="mt-14">
        <p>Ps. You can also become a Saunatime host in few clicks!</p>
    </div>
</main>
<footer class="mb-6 px-6 md:px-0">
    <div class="grid gap-5 grid-cols-5 container mx-auto space-x-6">
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
