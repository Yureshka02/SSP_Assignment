<div class="bg-gray-800 h-screen">
<x-app-layout>
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Suppliers') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full border border-gray-500">
                    <thead>
                    <tr class="bg-gray-700 text-gray-300 uppercase text-sm leading-normal">
                        <th class="px-4 py-2 border border-gray-500">ID</th>
                        <th class="px-4 py-2 border border-gray-500">Name</th>
                        <th class="px-4 py-2 border border-gray-500">Product</th>
                        <th class="px-4 py-2 border border-gray-500">Phone</th>
                        <th class="px-4 py-2 border border-gray-500">Email</th>
                        <th class="px-4 py-2 border border-gray-500">Address</th>
                        <th class="px-4 py-2 border border-gray-500">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-300 text-sm font-light">
                    @foreach ($suppliers as $supplier)
                        <tr class="border-b border-gray-500 hover:bg-gray-700">
                            <td class="border border-gray-500 px-4 py-2">{{ $supplier->id }}</td>
                            <td class="border border-gray-500 px-4 py-2">{{ $supplier->name }}</td>
                            <td class="border border-gray-500 px-4 py-2">{{ $supplier->product }}</td>
                            <td class="border border-gray-500 px-4 py-2">{{ $supplier->phone }}</td>
                            <td class="border border-gray-500 px-4 py-2">{{ $supplier->email }}</td>
                            <td class="border border-gray-500 px-4 py-2">{{ $supplier->address }}</td>
                            <td class="border border-gray-500 px-4 py-2">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('suppliers.show', $supplier->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline">
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
                    {{ $suppliers->links() }}
                </div>
                <div class="p-4">
                    <a href="{{ route('suppliers.create') }}" class="bg-teal-700 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded">Add suppliers</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
