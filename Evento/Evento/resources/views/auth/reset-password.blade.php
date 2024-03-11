<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">

<div class="container max-w-full mx-auto py-24 px-6">
    <div class="font-sans">
        <div class="shadow-2xl max-w-sm mx-auto px-6">
            <div class="relative flex flex-wrap">
                <div class="w-full relative">
                    <div class="mt-6">
                        <div class="mb-5 pb-1border-b-2 text-center font-base text-gray-700">
                        </div>
                        <div class="text-center text-lg font-semibold text-black">
                            Change Your Password
                        </div>

                        <form method="post" action="/forgot-password" class="mt-8">
                            @csrf
                            @error('password')
                            <p>{{$message}}</p>
                            @enderror
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="mx-auto max-w-lg">
                                <div class="py-2" x-data="{ show: true }">
                                    <span class="px-1 text-sm text-gray-600">Email</span>
                                    <div class="relative">
                                        <input placeholder="" name="email" type="email" value="{{$_GET['email']}}"
                                               class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                focus:placeholder-gray-500
                focus:bg-white
                focus:border-gray-600
                focus:outline-none" readonly>
                                    </div>
                                </div>

                                <div class="py-2" x-data="{ show: true }">
                                    <span class="px-1 text-sm text-gray-600">New Password</span>
                                    <div class="relative">
                                        <input placeholder="********" name="password" :type="show ? 'password' : 'text'"
                                               class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                focus:placeholder-gray-500
                focus:bg-white
                focus:border-gray-600
                focus:outline-none">

                                        <div class="py-2">
                                            <span class="px-1 text-sm text-gray-600">Password Confirmation</span>
                                            <input placeholder="********" type="password" name="password_confirmation"
                                                   class="text-md block px-3 py-2  rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                                        </div>

                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <label
                                        class="block text-gray-500 font-bold my-4">
                                        <input type="checkbox" name="member"
                                               class="leading-loose text-pink-600">
                                        <span class="py-2 text-sm text-gray-600 leading-snug"> Remember Me </span>
                                    </label>
                                </div>
                                <button class="mt-3 text-lg font-semibold
                bg-gray-800 w-full text-white rounded-lg
                px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                                    Login
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
