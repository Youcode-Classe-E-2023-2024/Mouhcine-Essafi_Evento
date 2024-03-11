
<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
<script src="https://cdn.tailwindcss.com"></script>

@include('organiser.side')

<main class="ml-60 pt-16 max-h-screen overflow-auto">
    <div class="text-xl font-bold text-center">Here you can approve your reservations</div>
    <div
        class="flex flex-wrap min-w-screen h-screen justify-around items-center outline-none focus:outline-none ">
        @foreach($events as $event)
            <div class="flex flex-col mb-6 p-8 bg-gray-200 shadow-md hover:shodow-lg rounded-2xl">
                Accepter cette reservation ?
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-16 h-16 rounded-2xl p-3 border border-blue-100 text-blue-400 bg-blue-50"
                             fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex flex-col ml-3">
                            <div class="font-medium leading-none">{{$event->title}}</div>
                            <div class="flex justify-between">
                                <p class="text-sm text-gray-600 leading-none mt-1">{{ \Carbon\Carbon::parse($event->date)->format('j, F') }}
                                    _</p>
                                <p class="text-sm text-gray-600 leading-none mt-1">{{$event->price}} DH _ </p>
                                <p class="text-sm text-gray-600 leading-none mt-1">{{$event->location}}</p>
                            </div>
                            {{--                                    <p class="text-sm text-gray-600 leading-none mt-1">--}}
                            {{--                                        Organizer: {{ $event->creator->name }}</p>--}}
                        </div>
                    </div>
                    <form action="/approve-reservation/{{$event->id}}" method="POST">
                        @csrf
                        <button type="submit"
                                class="flex-no-shrink bg-green-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-500 text-white rounded-full">
                            Confirm
                        </button>
                    </form>
                    <form action="/decline-reservation/{{$event->id}}" method="POST">
                        @csrf
                        <button type="submit"
                                class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">
                            Decline
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</main>
</body>
