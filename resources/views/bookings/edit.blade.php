<div class="bg-gray-800 h-screen">
<x-app-layout class="bg-gray-900 text-gray-200"> <!-- Set background color to dark gray and text color to white -->
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Booking') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('Bookings.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Customer Name -->
                    <div class="mb-4">
                        <label for="customer_name" class="block text-sm font-bold mb-2 text-white">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-800">
                        @error('customer_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Customer Phone -->
                    <div class="mb-4">
                        <label for="customer_phone" class="block text-sm font-bold mb-2 text-white">Customer Phone</label>
                        <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone', $booking->customer_phone) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-800">
                        @error('customer_phone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-bold mb-2 text-white">Address</label>
                        <textarea name="address" id="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-800">{{ old('address', $booking->address) }}</textarea>
                        @error('address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Employee ID -->
                    <div class="mb-4">
                        <label for="employee_id" class="block text-sm font-bold mb-2 text-white">Employee ID</label>
                        <input type="text" name="employee_id" id="employee_id" value="{{ old('employee_id', $booking->employee_id) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-800">
                        @error('employee_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Time -->
                    <div class="mb-4">
                        <label for="time" class="block text-sm font-bold mb-2 text-white">Time</label>
                        <input type="text" name="time" id="time" value="{{ old('time', $booking->time) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-800">
                        @error('time')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
