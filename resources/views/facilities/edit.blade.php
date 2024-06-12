<div class="bg-gray-800 h-screen">
<x-app-layout class="bg-gray-900">
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Edit Facility') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('facilities.update', $facility->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Facility Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Facility Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $facility->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight bg-gray-700 focus:outline-none focus:shadow-outline" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-300 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight bg-gray-700 focus:outline-none focus:shadow-outline" required>{{ old('description', $facility->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Availability -->
                    <div class="mb-4">
                        <label for="availability" class="block text-gray-300 text-sm font-bold mb-2">Availability</label>
                        <input type="text" name="availability" id="availability" value="{{ old('availability', $facility->availability) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight bg-gray-700 focus:outline-none focus:shadow-outline" required>
                        @error('availability')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Facility</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
    </div>
