<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of Pending Notices') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($pendingNotices as $notice)
                        <div style="margin-bottom: 20px; margin-top: 20px;">
                            <div style="display: flex; justify-content: space-between;">
                                <div>
                                    <h3>{{ $notice->type }} item - {{ $notice->date }}</h3>
                                    <p>Description: {{ $notice->description }}</p>
                                    <p>Venue: {{ $notice->venue }}</p>
                                </div>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <button onclick="window.location='{{ route('notices.show', $notice->id) }}'"
                                        class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">View Details</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
