<!-- resources/views/facilities/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Facility Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div>
                    <p class="font-bold">Facility Name:</p>
                    <p>{{ $facility->name }}</p>
                </div>

                <div class="mt-4">
                    <p class="font-bold">Description:</p>
                    <p>{{ $facility->description }}</p>
                </div>

                <div class="mt-4">
                    <p class="font-bold">Availability:</p>
                    <p>{{ $facility->availability }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
