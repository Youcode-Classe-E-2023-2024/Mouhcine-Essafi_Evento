@include('admin.side')

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<div class="flex overflow-hidden bg-white">
    <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64 mt-4">
        <main>
            <div
                class="flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster  fixed flex justify-center items-center inset-0  outline-none focus:outline-none bg-white">
                @foreach($events as $event)
                    <div class="flex flex-col p-8 bg-gray-200 shadow-md hover:shodow-lg rounded-2xl">
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
                            <form action="/approve-event/{{$event->id}}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex-no-shrink bg-green-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-500 text-white rounded-full">
                                    Publish
                                </button>
                            </form>
                            <form action="/decline-event/{{$event->id}}" method="POST">
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
        <p class="text-center text-sm text-gray-500 my-10">
            &copy;<?php echo date("Y"); ?>. All rights
            reserved.
        </p>
    </div>
</div>
