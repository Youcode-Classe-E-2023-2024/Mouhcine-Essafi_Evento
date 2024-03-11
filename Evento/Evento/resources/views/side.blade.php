<nav class="p-6 px-12">
    <div class="flex justify-between items-center">
        <h1 class="pr-6 border-r-2 text-2xl font-bold text-gray-500">Evento</h1>
        <div class="flex justify-between mt-4 flex-grow">
            <form action="/search" method="post">
                @csrf
                <div class="flex ml-6 items-center">
                <span>
                    <button type="submit">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 cursor-pointer text-gray-500"
                           fill="none"
                           viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                      </svg>
                    </button>
                </span>
                    <input class="outline-none text-sm flex-grow bg-gray-100 p-2 rounded-lg" type="text" name="search"
                           placeholder="Search ..."/>
                </div>
            </form>
            <div class="md:flex space-x-6 hidden">
                @guest
                    {{-- Afficher les liens uniquement si l'utilisateur n'est pas connecté --}}
                    {{-- <span class="text-gray-500 text-md">+ Add your sauna</span> --}}
                    <a href="/register"
                       class="text-white font-semibold flex justify-center items-center px-4 text-lg bg-gray-400 hover:bg-gray-600 rounded-xl">Sign
                        up</a>
                    <a href="/login"
                       class="text-white font-semibold flex justify-center items-center px-4 text-lg bg-gray-400 hover:bg-gray-600 rounded-xl">Login</a>
                @endguest
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button
                            class="inline-flex items-center justify-center h-9  rounded-xl text-black hover:text-white text-sm font-semibold transition">
                            <svg class="w-5 h-5 text-black dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                            </svg>
                        </button>
                        <button class="font-bold text-md ml-2">Logout</button>
                    </form>
                @endguest

            </div>

        </div>
    </div>
</nav>
