<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <p class="font-bold">ID:</p>
                        <p>{{ $product->id }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-bold">Title:</p>
                        <p>{{ $product->title }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-bold">Description:</p>
                        <p>{{ $product->description }}</p>
                    </div>
                    <!-- Add more details here if needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
