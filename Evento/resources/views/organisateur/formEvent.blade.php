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
                        <li><a href="{{ route('evento')}}" class="hover:text-gray-200 hover:underline px-4">Evento</a></li>
                        <li><a href="{{ url('/dashboard') }}" class="hover:text-gray-200 hover:underline px-4" >Dashboard</a></li>
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
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6 text-black">
        <div class="mx-auto w-[750px] bg-white">
            <form action="{{route('addEvent')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                Title
                            </label>
                            <input type="text" name="title" placeholder="Event title"
                                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="location" class="mb-3 block text-base font-medium text-[#07074D]">
                                Location
                            </label>
                            <select name="location"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <option value="" selected>Choose a location</option>
                                @foreach($data as $item)
                                    <option value="{{ $item->ville }}">{{ $item->ville }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                Date
                            </label>
                            <input type="date" name="date" id="date"
                                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                Time
                            </label>
                            <input type="time" name="time" id="time"
                                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                        </div>
                    </div>
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="price" class="mb-3 block text-base font-medium text-[#07074D]">
                                Price
                            </label>
                            <input type="number" name="price" id="date" placeholder="245.00"
                                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="nbr_place" class="mb-3 block text-base font-medium text-[#07074D]">
                                Total tickets
                            </label>
                            <input type="number" name="nbr_place" id="time" placeholder="Nombre de places"
                                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                        Description
                    </label>
                    <textarea type="text" name="description" placeholder="Event description"
                              class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </textarea>
                </div>

                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">
                        Do you want this reservation to be done manually or automatically?
                    </label>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center">
                            <input type="radio" name="reservation_type" value="manuel" id="radioButton1"
                                   class="h-5 w-5"/>
                            <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                Manually
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="reservation_type" value="auto" id="radioButton2"
                                   class="h-5 w-5"/>
                            <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                                Automatically
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="category_id" class="mb-3 block text-base font-medium text-[#07074D]">
                        Category
                    </label>
                    <select name="category" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="" selected>Choose a category</option>
                        @foreach ($categories as $category)                            
                        <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- component -->
                <div
                    class="bg-gray-100 h-36 p-8 text-center rounded-lg border-dashed border-2 border-gray-300 hover:border-blue-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-md"
                    id="dropzone">
                    <label for="fileInput" class="cursor-pointer flex flex-col items-center space-y-2">
                        <svg class="w-16 h-10 text-gray-400" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="text-gray-600">Drag and drop your files here</span>
                        <span class="text-gray-500 text-sm">(or click to select)</span>
                    </label>
                    <input type="file" id="fileInput" class="hidden" name="image" multiple>
                </div>
                <div class="mt-6 text-center" id="fileList"></div>
                <script>
                    const dropzone = document.getElementById('dropzone');
                    const fileInput = document.getElementById('fileInput');
                    const fileList = document.getElementById('fileList');

                    dropzone.addEventListener('dragover', (e) => {
                        e.preventDefault();
                        dropzone.classList.add('border-blue-500', 'border-2');
                    });

                    dropzone.addEventListener('dragleave', () => {
                        dropzone.classList.remove('border-blue-500', 'border-2');
                    });

                    dropzone.addEventListener('drop', (e) => {
                        e.preventDefault();
                        dropzone.classList.remove('border-blue-500', 'border-2');

                        const files = e.dataTransfer.files;
                        handleFiles(files);
                    });

                    fileInput.addEventListener('change', (e) => {
                        const files = e.target.files;
                        handleFiles(files);
                    });

                    function handleFiles(files) {
                        fileList.innerHTML = '';

                        for (const file of files) {
                            const listItem = document.createElement('div');
                            listItem.textContent = `${file.name} (${formatBytes(file.size)})`;
                            fileList.appendChild(listItem);
                        }
                    }

                    function formatBytes(bytes) {
                        if (bytes === 0) return '0 Bytes';

                        const k = 1024;
                        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                        const i = Math.floor(Math.log(bytes) / Math.log(k));

                        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
                    }

                </script>
                <div>
                    <button
                        class="hover:shadow-form rounded-md bg-black py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Save
                    </button>
                </div>
            </form>
        </div>
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

    <script>
        function getCarouselData() {
            return {
                currentIndex: 0,
                images: [
                    'https://source.unsplash.com/collection/1346951/800x800?sig=1',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=2',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=3',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=4',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=5',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=6',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=7',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=8',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=9',
                ],
                increment() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
                },
                decrement() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
                },
            }
        }
    </script>

</body>

</html>