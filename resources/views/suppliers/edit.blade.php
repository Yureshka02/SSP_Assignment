<div class="bg-gray-800 h-screen">
<x-app-layout class="bg-gray-900">
    <div class="bg-gray-900 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Edit Supplier details') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Supplier Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Supplier Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $supplier->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline bg-gray-700 text-gray-300" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product -->
                    <div class="mb-4">
                        <label for="product" class="block text-gray-300 text-sm font-bold mb-2">Product</label>
                        <input type="text" name="product" id="product" value="{{ old('product', $supplier->product) }}" class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline bg-gray-700 text-gray-300" required>
                        @error('product')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $supplier->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 0 leading-tight focus:outline-none focus:shadow-outline bg-gray-700 text-gray-300" required>
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-300 text-sm font-bold mb-2">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $supplier->phone) }}" class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline bg-gray-700 text-gray-300" required>
                        @error('phone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block text-gray-300 text-sm font-bold mb-2">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $supplier->address) }}" class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline bg-gray-700 text-gray-300" required>
                        @error('address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Supplier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
