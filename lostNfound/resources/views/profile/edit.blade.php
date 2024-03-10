<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="w-3/4"></div>
                <div class="w-1/4 flex justify-end"> <!-- Modified this line -->
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('storage/' .  $user->profile_image) }}" alt="Profile Image" class="rounded-full"
                            style="max-width: 400px; max-height: 400px;">
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
