<x-app-layout class="bg-gray-900">
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Products') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800">
            @if(session()->has('flash.banner'))
                <div class="bg-blue-500 text-white p-4 mb-4" role="alert">
                    {{ session('flash.banner') }}
                </div>
            @endif
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-auto w-full text-gray-300">
                    <thead>
                    <tr>
                        <th class="px-4 py-2 border border-gray-400">ID</th>
                        <th class="px-4 py-2 border border-gray-400">Name</th>
                        <th class="px-4 py-2 border border-gray-400">Description</th>
                        <th class="px-4 py-2 border border-gray-400">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="border px-4 py-2 border-gray-400">{{ $product->id }}</td>
                            <td class="border px-4 py-2 border-gray-400">{{ $product->title }}</td>
                            <td class="border px-4 py-2 border-gray-400">{{ $product->description }}</td>
                            <td class="border px-4 py-2 border-gray-400">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{-- Adding page links --}}
                <div class="p-4">
                    {{ $products->links() }}
                </div>
                <div class="p-4">
                    <a href="{{ route('products.create') }}" class="bg-teal-700 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded">Add Product</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
