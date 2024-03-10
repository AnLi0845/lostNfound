<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Notice Details
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg dark:text-gray-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <div class="w-3/4">
                            <h1 class="text-xl font-medium text-gray-900 dark:text-gray-100">{{ $notice->type }} Notice
                                Details</h1>
                            <p class="mt-6">Date: {{ $notice->date }}</p>
                            <p>Venue: {{ $notice->venue }}</p>
                            <p>Contact: {{ $notice->contact }}</p>
                            <p>Description: {{ $notice->description }}</p>

                        </div>
                        <div class="w-1/4">
                            <img src="{{ asset('storage/' . $notice->image) }}" alt="Item Image"
                                style="max-width: 400px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($notice->status === 'completed' && $responses)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg dark:text-gray-300">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-xl font-medium text-gray-900 dark:text-gray-100">Response Details</h1>
                        <p class="mt-6">Response: {{ $responses->message }}</p>
                        <p>Response Date: {{ $responses->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg dark:text-gray-300">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <form action="{{ route('notices.respond', $notice->id) }}" method="POST">
                                @csrf
                                <textarea name="message" class="form-textarea mt-1 block w-full text-gray-900" placeholder="Your response" required></textarea>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-2">
                                    Respond
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    
</x-app-layout>
