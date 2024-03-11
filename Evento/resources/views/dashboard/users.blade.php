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
                            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">HasRole</th>
                            <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">ChangeTo</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($users as $user){
                            
                        <tr>
                            <td class="py-4 px-6 border-b border-gray-200">{{$user->name}}</td>
                            <td class="py-4 px-6 border-b border-gray-200 truncate">{{$user->email}}</td>
                            <th class="py-4 px-6 border-b border-gray-200 uppercase">@foreach ($user->roles as $role){{ $role->name }}@endforeach</th>
                            <td class="py-4 px-6 border-b border-gray-200">
                                    <form action="{{ route('assign_role') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <div class="inline-flex rounded-md shadow-sm" role="group">
                                            <select name="role_id" data-user="{{$user->id}}" onchange="this.form.submit()">
                                                <option value="">Assign Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                            </td>
                        </tr>
                    }
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
