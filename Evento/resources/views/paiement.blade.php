<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Blog Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Shop</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li><a href="{{ route('AllEvento')}}" class="hover:text-gray-200 hover:underline px-4">Evento</a></li>
                    <li><a href="{{ url('/dashboard') }}" class="hover:text-gray-200 hover:underline px-4">Dashboard</a></li>
                    @else
                    <li><a href="{{ route('login') }}" class="hover:text-gray-200 hover:underline px-4">Log in</a></li>

                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="hover:text-gray-200 hover:underline px-4">Register</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Evento
            </a>
            <p class="text-lg text-gray-600">
                Creating Moments to Remember
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#" class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center" @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6 text-black">
        <!-- Posts Section -->
        <main class="mx-auto max-w-6xl px-4 py-8">
            <script src="https://cdn.tailwindcss.com"></script>
<div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
    <div class="px-4 pt-12">
        <p class="text-xl font-medium">Order Summary</p>
        <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
        <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
            {{--            @foreach($event as $item)--}}
            <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                <img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="{{$event->image}}" alt=""/>
                <div class="flex w-full flex-col px-4 py-4">
                    <span class="font-semibold">{{$event->title}}</span>
                    <span class="flex item-center float-right text-gray-400">
                            <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M12 2a8 8 0 0 1 6.6 12.6l-.1.1-.6.7-5.1 6.2a1 1 0 0 1-1.6 0L6 15.3l-.3-.4-.2-.2v-.2A8 8 0 0 1 11.8 2Zm3 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                      clip-rule="evenodd"/>
                            </svg>
                            {{$event->location}}
                        </span>
                    <p class="text-lg font-bold">{{$event->price}} DH</p>
                </div>
            </div>
            {{--            @endforeach--}}
        </div>
    </div>
    <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
        <p class="text-xl font-medium">Payment Details</p>
        <p class="text-gray-400">Complete your order by providing your payment details.</p>
        <div class="">
            <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
            <div class="relative">
                <input type="text" id="email" name="email"
                       class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                       placeholder="cymifodac@mailinator.com"/>
                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                    </svg>
                </div>
            </div>
            <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Card Holder</label>
            <div class="relative">
                <input type="text" id="card-holder" name="card-holder"
                       class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Katrina FAtrikaas"/>
                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"/>
                    </svg>
                </div>
            </div>
            <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Card Details</label>
            <div class="flex">
                <div class="relative w-7/12 flex-shrink-0">
                    <input type="number" id="card-no" name="card-no"
                           class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                           placeholder="1144-0014-1001-3271"/>
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z"/>
                            <path
                                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z"/>
                        </svg>
                    </div>
                </div>
                <input type="text" name="credit-expiry"
                       class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                       placeholder="11/03"/>
                <input type="number" name="credit-cvc"
                       class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                       placeholder="122"/>
            </div>
            <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Billing Address</label>
            <div class="flex flex-col sm:flex-row">
                <div class="relative flex-shrink-0 sm:w-7/12">
                    <input type="text" id="billing-address" name="billing-address"
                           class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Enim sequi veritatis"/>
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        <img class="h-4 w-4 object-contain"
                             src="https://flagpack.xyz/_nuxt/4c829b6c0131de7162790d2f897a90fd.svg" alt=""/>
                    </div>
                </div>
                <select type="text" name="billing-state"
                        class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    <option value="State">State</option>
                </select>
                <input type="number" name="billing-zip"
                       class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                       placeholder="33"/>
            </div>

            <!-- Total -->
            {{--            <div class="mt-6 border-t border-b py-2">--}}
            {{--                <div class="flex items-center justify-between">--}}
            {{--                    <p class="text-sm font-medium text-gray-900">Subtotal</p>--}}
            {{--                    <p class="font-semibold text-gray-900">$399.00</p>--}}
            {{--                </div>--}}
            {{--                <div class="flex items-center justify-between">--}}
            {{--                    <p class="text-sm font-medium text-gray-900">Shipping</p>--}}
            {{--                    <p class="font-semibold text-gray-900">$8.00</p>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="mt-6 flex items-center justify-between">
                <p class="text-sm font-medium text-gray-900">Total</p>
                <p class="text-2xl font-semibold text-gray-900">{{$event->price}} DH</p>
            </div>
        </div>
        <form action="/buy/{{$event->id}}" method="post">
            @csrf
            <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">
                Place Order
            </button>
        </form>
    </div>
</div>
@if(Session::has('success'))
    <div id="alert-message" class="hidden bg-green-500 text-white px-4 py-3 absolute mx-auto end-0 rounded shadow-lg">
        {{ Session::get('success') }}
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertMessage = document.getElementById('alert-message');
        alertMessage.classList.remove('hidden');

        setTimeout(function() {
            alertMessage.classList.add('hidden');
        }, 4000);
    });
</script>

        </main>
        
    </div>
    

    <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; myblog.com</div>
        </div>
    </footer>
</body>

</html>