<div class="bg-gray-800 h-screen">
    <x-app-layout class="bg-gray-900">
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Add Customers') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800">
            <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf

                    <!-- Customer Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Customer Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight bg-gray-700 focus:outline-none focus:shadow-outline" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight bg-gray-700 focus:outline-none focus:shadow-outline" required>
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-300 text-sm font-bold mb-2">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight bg-gray-700 focus:outline-none focus:shadow-outline" required>
                        @error('phone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block text-gray-300 text-sm font-bold mb-2">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight bg-gray-700 focus:outline-none focus:shadow-outline" required>
                        @error('address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tier -->
                    <div class="mb-4">
                        <label for="tier" class="block text-gray-300 text-sm font-bold mb-2">Tier</label>
                        <input type="text" name="tier" id="tier" value="{{ old('tier') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight bg-gray-700 focus:outline-none focus:shadow-outline" required>
                        @error('tier')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
