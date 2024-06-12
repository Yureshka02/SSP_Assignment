<!-- resources/views/customers/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Customer Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Customer Name</label>
                    <p class="text-gray-900">{{ $customer->name }}</p>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <p class="text-gray-900">{{ $customer->email }}</p>
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                    <p class="text-gray-900">{{ $customer->phone }}</p>
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                    <p class="text-gray-900">{{ $customer->address }}</p>
                </div>

                <!-- Tier -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tier</label>
                    <p class="text-gray-900">{{ $customer->tier }}</p>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('customers.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to Customers List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
