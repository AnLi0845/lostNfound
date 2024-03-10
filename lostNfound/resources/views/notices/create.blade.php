<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Notice') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-900 ">
                    <form action="{{ route('notices.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Add form fields for notice creation -->
                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 dark:text-gray-300">Type:</label>
                        <select name="type" id="type" required class="form-select mt-1 block w-full">
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 dark:text-gray-300">Date:</label>
                        <input type="date" name="date" id="date" required
                            class="form-input mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="venue" class="block text-gray-700 dark:text-gray-300">Venue:</label>
                        <input type="text" name="venue" id="venue" required
                            class="form-input mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="contact" class="block text-gray-700 dark:text-gray-300">Contact:</label>
                        <input type="text" name="contact" id="contact" required
                            class="form-input mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-300">Description:</label>
                        <textarea name="description" id="description" required class="form-textarea mt-1 block w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 dark:text-gray-300">Image:</label>
                        <input type="file" name="image" id="image" class="form-control mt-1 block w-full bg-white">
                    </div>
                    <div class="mb-4; justify-content: center; align-items: center">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ">Create
                            Notice</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
