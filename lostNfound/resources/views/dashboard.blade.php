<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of My Notices') }}
        </h2>
    </x-slot>

    @if ($noticesGroupedByType->isNotEmpty())
        @if (isset($noticesGroupedByType['lost']) && $noticesGroupedByType['lost']->isNotEmpty())
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100 ">
                            <h1 class="text-xl font-medium text-gray-900 dark:text-gray-100">Lost Notices:</h1>
                            <ul class="mt-6">
                                @foreach ($noticesGroupedByType['lost'] as $key => $notice)
                                    <div style="margin-bottom: 20px; margin-top: 20px;">
                                        <div style="display: flex; justify-content: space-between;">
                                            <div>
                                                <h3>{{ $notice->type }} items</h3>
                                                <p>Date: {{ $notice->date }}</p>
                                                <p>Description: {{ $notice->description }}</p>
                                                <p>Venue: {{ $notice->venue }}</p>
                                                <p>Status: {{ $notice->status }}</p>
                                            </div>
                                            <div style="display: flex; justify-content: center; align-items: center;">
                                                <button
                                                    onclick="window.location='{{ route('notices.show', $notice->id) }}'"
                                                    class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">View
                                                    Details</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($loop->last)
                                    @break
                                @endif
                                <hr class="mt-6 mx-auto" style="width: 90%;">
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
    @endif
    @if (isset($noticesGroupedByType['found']) && $noticesGroupedByType['found']->isNotEmpty())
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <h1 class="text-xl font-medium text-gray-900 dark:text-gray-100">Found Notices:</h1>
                        <ul class="mt-6">
                            @foreach ($noticesGroupedByType['found'] as $key => $notice)
                                <div style="margin-bottom: 20px; margin-top: 20px;">
                                    <div style="display: flex; justify-content: space-between;">
                                        <div>
                                            <h3>{{ $notice->type }} items</h3>
                                            <p>Date: {{ $notice->date }}</p>
                                            <p>Description: {{ $notice->description }}</p>
                                            <p>Venue: {{ $notice->venue }}</p>
                                            <p>Status: {{ $notice->status }}</p>
                                        </div>
                                        <div style="display: flex; justify-content: center; align-items: center;">
                                            <button
                                                onclick="window.location='{{ route('notices.show', $notice->id) }}'"
                                                class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">View
                                                Details</button>
                                        </div>
                                    </div>
                                </div>
                                @if ($loop->last)
                                @break
                            @endif
                            <hr class="mt-6 mx-auto" style="width: 90%;">
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
@else
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">Notices:</h1>
                <p>You haven't created any notices yet.</p>
            </div>
        </div>
    </div>
</div>
@endif

@if ($respondedNoticesGroupedByType->isNotEmpty())
<div class=" py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">Notices I've Responded To:</h1>
                @if (isset($respondedNoticesGroupedByType['found']) && $respondedNoticesGroupedByType['found']->isNotEmpty())
                    <ul>
                        @foreach ($respondedNoticesGroupedByType['found'] as $key => $notice)
                            <div style="margin-bottom: 20px; margin-top: 20px;">
                                <div style="display: flex; justify-content: space-between;">
                                    <div>
                                        <h3>{{ $notice->type }} items</h3>
                                        <p>Date: {{ $notice->date }}</p>
                                        <p>Description: {{ $notice->description }}</p>
                                        <p>Venue: {{ $notice->venue }}</p>
                                        <p>Status: {{ $notice->status }}</p>
                                    </div>
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <button
                                            onclick="window.location='{{ route('notices.show', $notice->id) }}'"
                                            class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">View
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                            @if ($loop->last)
                            @break
                        @endif
                        <hr class="mt-6 mx-auto" style="width: 90%;">
                    @endforeach
            @endif
            @if (isset($respondedNoticesGroupedByType['lost']) && $respondedNoticesGroupedByType['lost']->isNotEmpty())
            <hr><hr>
                @foreach ($respondedNoticesGroupedByType['lost'] as $key => $notice)
                    <div style="margin-bottom: 20px; margin-top: 20px;">
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <h3>{{ $notice->type }} items</h3>
                                <p>Date: {{ $notice->date }}</p>
                                <p>Description: {{ $notice->description }}</p>
                                <p>Venue: {{ $notice->venue }}</p>
                                <p>Status: {{ $notice->status }}</p>
                            </div>
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <button
                                    onclick="window.location='{{ route('notices.show', $notice->id) }}'"
                                    class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">View
                                    Details</button>
                            </div>
                        </div>
                    </div>
                    @if ($loop->last)
                    @break
                @endif
                <hr class="mt-6 mx-auto" style="width: 90%;">
            @endforeach
        @endif
        </ul>
    </div>
</div>
</div>
</div>
@else
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">Notices I've Responded To:</h1>
        <p>You haven't responded to any notices yet.</p>
    </div>
</div>
</div>
</div>

@endif
<div class="py-12"></div>
</x-app-layout>
