<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
<script src="https://cdn.tailwindcss.com"></script>

@include('organiser.side')

<main class="ml-60 pt-16 max-h-screen overflow-auto">
    <div class="text-xl font-bold text-center">Here you can create your events</div>
    <div class="px-6 py-8">
        <div class="max-w-xl mx-auto">
            <div class="bg-white rounded-3xl pt-4">
                <div class="flex items-center justify-center p-12">
                    <!-- Author: FormBold Team -->
                    <div class="mx-auto w-full max-w-[550px] bg-white">
                        <form action="/updateEvent/{{$event->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="-mx-3 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Title
                                        </label>
                                        <input type="text" name="title" placeholder="Event title"
                                               value="{{$event['title']}}"
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
                                                <option
                                                    value="{{ $item->ville }}" {{ $event->location == $item->ville ? 'selected' : '' }}>{{ $item->ville }}</option>
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
                                        <input type="date" name="date" id="date" value="{{$event['date']}}"
                                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Time
                                        </label>
                                        <input type="time" name="time" id="time" value="{{$event['time']}}"
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
                                        <input type="number" name="price" placeholder="245.00"
                                               value="{{$event['price']}}"
                                               readonly  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label for="nbr_place" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Total tickets
                                        </label>
                                        <input type="number" name="nbr_place" placeholder="Nombre de places"
                                               value="{{$event['nbr_place']}}"
                                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="location" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Category
                                </label>
                                <select name="category" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                    <option value="" disabled>Choose a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $event->category) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="mb-5">
                                <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Description
                                </label>
                                <textarea type="text" name="description" placeholder="Event description"
                                          class="text-left text-justify w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                {{$event['description']}}
                                </textarea>
                            </div>

                            <div class="mb-5">
                                <label class="mb-3 block text-base font-medium text-[#07074D]">
                                    Do you want this reservation to be done manually or automatically?
                                </label>
                                <div class="flex items-center space-x-6">
                                    <div class="flex items-center">
                                        <input type="radio" name="reservation_type" value="manuel" id="radioButton1"
                                               class="h-5 w-5" @if($event->reservation_type == 'manuel') checked @endif />
                                        <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                            Manually
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="reservation_type" value="automatic" id="radioButton2"
                                               class="h-5 w-5" @if($event->reservation_type == 'automatic') checked @endif />
                                        <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                                            Automatically
                                        </label>
                                    </div>
                                </div>
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
                                <input type="file" id="fileInput" class="hidden" name="image">
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
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
