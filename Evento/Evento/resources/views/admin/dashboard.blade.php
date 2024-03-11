@include('admin.side')

<div class="flex overflow-hidden bg-white">
    <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64 mt-4">
        <main>
            <div class="pt-6 px-4">
                <div class="mb-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span
                                    class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$publicEvents}}</span>
                                <h3 class="text-base font-normal text-gray-500">All public events</h3>
                            </div>
                            <div
                                class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 10h18M6 14h2m3 0h5M3 7v10c0 .6.4 1 1 1h16c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H4a1 1 0 0 0-1 1Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span
                                    class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$totalCategories}}</span>
                                <h3 class="text-base font-normal text-gray-500">All categories</h3>
                            </div>
                            <div
                                class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 10h18M6 14h2m3 0h5M3 7v10c0 .6.4 1 1 1h16c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H4a1 1 0 0 0-1 1Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span
                                    class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{$totalUsers}}</span>
                                <h3 class="text-base font-normal text-gray-500">All users</h3>
                            </div>
                            <div
                                class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                          d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3a2.5 2.5 0 1 1 2-4.5M19.5 17h.5c.6 0 1-.4 1-1a3 3 0 0 0-3-3h-1m0-3a2.5 2.5 0 1 0-2-4.5m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3c0 .6-.4 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
{{--                        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">--}}
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold leading-none text-gray-900">Latest Users</h3>
                                <a href="/allusers"
                                   class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                                    View all
                                </a>
                            </div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200">
                                    @foreach($LatestUsers as $user)
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <img class="h-8 w-8 rounded-full"
                                                         src="{{$user->picture}}"
                                                    >
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-medium text-gray-900 truncate">
                                                        {{$user->name}}
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate">
                                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                           data-cfemail="17727a767e7b57607e7973646372653974787a">{{$user->email}}</a>
                                                    </p>
                                                </div>
                                                <div class="inline-flex items-center text-base  text-gray-600">
                                                    @foreach ($user->roles as $role)
                                                        {{ $role->name }}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
{{--                        </div>--}}
{{--                        <div class="flex items-center justify-between mb-4">--}}
{{--                            <div class="flex-shrink-0">--}}
{{--                                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span>--}}
{{--                                <h3 class="text-base font-normal text-gray-500">Sales this week</h3>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">--}}
{{--                                12.5%--}}
{{--                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"--}}
{{--                                     xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path fill-rule="evenodd"--}}
{{--                                          d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"--}}
{{--                                          clip-rule="evenodd"></path>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div id="main-chart"></div>--}}
                    </div>

                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Organizer</h3>
                                <span
                                    class="text-base font-normal text-gray-500">This is a list of latest organizer</span>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="events"
                                   class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View
                                    all</a>
                            </div>
                        </div>
                        <div class="flex flex-col mt-8">
                            <div class="overflow-x-auto rounded-lg">
                                <div class="align-middle inline-block min-w-full">
                                    <div class="shadow overflow-hidden sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Organizer
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Email
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                            @foreach($LatestOrganizer as $organizer)
                                                <tr>
                                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                        <span class="font-semibold">{{$organizer->name}}</span>
                                                    </td>
                                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                        {{$organizer->email}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">--}}
{{--                        <div class="mb-4 flex items-center justify-between">--}}
{{--                            <div>--}}
{{--                                <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Organizer</h3>--}}
{{--                                <span--}}
{{--                                    class="text-base font-normal text-gray-500">This is a list of latest organizer</span>--}}
{{--                            </div>--}}
{{--                            <div class="flex-shrink-0">--}}
{{--                                <a href="events"--}}
{{--                                   class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View--}}
{{--                                    all</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col mt-8">--}}
{{--                            <div class="overflow-x-auto rounded-lg">--}}
{{--                                <div class="align-middle inline-block min-w-full">--}}
{{--                                    <div class="shadow overflow-hidden sm:rounded-lg">--}}
{{--                                        <table class="min-w-full divide-y divide-gray-200">--}}
{{--                                            <thead class="bg-gray-50">--}}
{{--                                            <tr>--}}
{{--                                                <th scope="col"--}}
{{--                                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                                    Organizer--}}
{{--                                                </th>--}}
{{--                                                <th scope="col"--}}
{{--                                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                                    Email--}}
{{--                                                </th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody class="bg-white">--}}
{{--                                            @foreach($LatestOrganizer as $organizer)--}}
{{--                                                <tr>--}}
{{--                                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">--}}
{{--                                                        <span class="font-semibold">{{$organizer->name}}</span>--}}
{{--                                                    </td>--}}
{{--                                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">--}}
{{--                                                        {{$organizer->email}}--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
{{--                //latestusers--}}
{{--                <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">--}}
{{--                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">--}}
{{--                        <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Acquisition Overview</h3>--}}
{{--                        <div class="block w-full overflow-x-auto">--}}
{{--                            <table class="items-center w-full bg-transparent border-collapse">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">--}}
{{--                                        Event--}}
{{--                                    </th>--}}
{{--                                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">--}}
{{--                                        Location--}}
{{--                                    </th>--}}
{{--                                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">--}}
{{--                                        Location--}}
{{--                                    </th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody class="divide-y divide-gray-100">--}}
{{--                                @foreach($LatestEvents as $event)--}}
{{--                                    <tr class="text-gray-500">--}}
{{--                                        <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">--}}
{{--                                            {{$event->title}}--}}
{{--                                        </th>--}}
{{--                                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">--}}
{{--                                            5{{$event->price}} DH--}}
{{--                                        </td>--}}
{{--                                        <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">--}}
{{--                                            <div class="flex items-center">--}}
{{--                                                <span class="mr-2 text-xs font-medium">{{$event->location}}</span>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </main>
        <p class="text-center text-sm text-gray-500 my-10">
            &copy;<?php echo date("Y"); ?>. All rights
            reserved.
        </p>
    </div>
</div>
