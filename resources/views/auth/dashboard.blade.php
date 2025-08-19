<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-body p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <h4 class="text-lg font-semibold mb-2">{{ __("Welcome Back!") }}</h4>
                    <p>{{ __("You're logged in!") }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
