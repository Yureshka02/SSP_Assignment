<div class="bg-gray-800 h-screen">
<x-app-layout class="bg-gray-900">
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Edit Products') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('products.update', $product->id) }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="block text-gray-300 text-sm font-bold mb-2">Title</label>
                        <input type="text" name="title" id="title" value="{{ $product->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline bg-gray-700 text-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-300 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline bg-gray-700 text-gray-300">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
