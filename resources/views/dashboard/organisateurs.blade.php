<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <div class="py-12 px-6">
        <div class="overflow-x-auto">
            <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
                <table class="w-full table-fixed">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
                            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>
                            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Status</th>
                            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Change to</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr>
                            <td class="py-4 px-6 border-b border-gray-200">Jane Doe</td>
                            <td class="py-4 px-6 border-b border-gray-200 truncate">janedoe@gmail.com</td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                <button style="background-color: green" class="bg-green-500 text-white py-1 px-2 rounded-full text-xs">Active</button>
                            </td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                <button style="background-color: red" class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Inactive</button>
                            </td>
                        </tr>
                        <!-- Add more rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
