<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catégories') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <section class="py-6 sm:py-12 dark:bg-gray-800 dark:text-gray-100">
                <button data-modal-target="#crud-modal" data-modal-toggle class="block absolute right-4 text-white bg-black hover:bg-gray focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Add category
                </button>
                <div class="container p-6 mx-auto space-y-8">
                    <!-- Modal toggle -->

                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal content -->
                            <div class="relative">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create New Category
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                        </div>
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Add new category
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2 text-center">
                        <h2 class="text-3xl font-bold">All Categories</h2>
                        <p class="font-serif text-sm dark:text-gray-400">Here you can add and see all categories.</p>
                    </div>

                    <div class="grid grid-cols-1 gap-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                        @foreach($categories as $category)
                        <div class=" text-slate-950 w-full max-w-full px-3 md:flex-none">
                            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                                <div class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                </div>
                                <div class="flex-auto p-4 pt-0 text-center">
                                    <h6 class="mb-0 text-center text-2xl">{{ $category->name }}</h6>
                                    <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                                    <span class="leading-tight text-xs">Created at {{ $category->created_at->format('Y-m-d') }}</span>
                                </div>
                                <div class="w-full flex justify-center mb-4">
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" data-modal-target="popup-modal-{{ $category->id }}" data-modal-toggle="popup-modal-{{ $category->id }}" class="flex justify-center items-center gap-2 w-16 h-12 cursor-pointer rounded-md shadow-2xl text-white font-semibold bg-red-600 hover:shadow-xl hover:shadow-red-500 hover:scale-105 duration-300 hover:from-[#be123c] hover:to-[#fb7185]" style="background-color: red;" type="button">
                                            <svg viewBox="0 0 15 15" class="w-5 fill-white">
                                                <svg class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" stroke-linejoin="round" stroke-linecap="round"></path>
                                                </svg>
                                                Button
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalButton = document.querySelector('[data-modal-toggle]');
            const modal = document.querySelector(modalButton.getAttribute('data-modal-target'));
            const modalContent = modal.querySelector('.relative');

            modalButton.addEventListener("click", function() {
                modal.classList.toggle('hidden');
            });

            const closeButton = modal.querySelector('[data-modal-hide]');
            closeButton.addEventListener("click", function() {
                modal.classList.add('hidden');
            });

            // Close modal when clicking outside of it
            modal.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script> -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalButton = document.querySelector('[data-modal-toggle]');
        const modal = document.querySelector(modalButton.getAttribute('data-modal-target'));
        const modalContent = modal.querySelector('.relative');

        modalButton.addEventListener("click", function() {
            modal.classList.toggle('hidden');
        });

        // Close modal when clicking outside of it
        document.addEventListener("click", function(event) {
            if (!modalContent.contains(event.target) && !modalButton.contains(event.target)) {
                modal.classList.add('hidden');
            }
        });
    });
</script>

</x-app-layout>