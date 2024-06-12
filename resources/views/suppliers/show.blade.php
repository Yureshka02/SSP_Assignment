<!-- resources/views/suppliers/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supplier Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Name</h3>
                    <p class="text-gray-700">{{ $supplier->name }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Product</h3>
                    <p class="text-gray-700">{{ $supplier->product }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Email</h3>
                    <p class="text-gray-700">{{ $supplier->email }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Phone</h3>
                    <p class="text-gray-700">{{ $supplier->phone }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Address</h3>
                    <p class="text-gray-700">{{ $supplier->address }}</p>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('suppliers.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to Suppliers</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
