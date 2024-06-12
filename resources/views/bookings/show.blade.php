<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Booking Information</h3>
                <ul class="list-disc ml-6">
                    <li><span class="font-bold">Customer Name:</span> {{ $booking->customer_name }}</li>
                    <li><span class="font-bold">Customer Phone:</span> {{ $booking->customer_phone }}</li>
                    <li><span class="font-bold">Address:</span> {{ $booking->address }}</li>
                    <li><span class="font-bold">Employee ID:</span> {{ $booking->employee_id }}</li>
                    <li><span class="font-bold">Time:</span> {{ $booking->time }}</li>
                    <li><span class="font-bold">Slug:</span> {{ $booking->slug }}</li>
                    <li><span class="font-bold">Created At:</span> {{ $booking->created_at }}</li>
                    <li><span class="font-bold">Updated At:</span> {{ $booking->updated_at }}</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
