<x-app-layout>
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Customers') }}
        </h2>
    </div>


    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full border-gray-500 border">
                    <thead>
                    <tr class="bg-gray-700 text-gray-300 uppercase text-sm leading-normal">
                        <th class="border-gray-500 border px-4 py-2">ID</th>
                        <th class="border-gray-500 border px-4 py-2">Name</th>
                        <th class="border-gray-500 border px-4 py-2">Email</th>
                        <th class="border-gray-500 border px-4 py-2">Phone</th>
                        <th class="border-gray-500 border px-4 py-2">Address</th>
                        <th class="border-gray-500 border px-4 py-2">Tier</th>
                        <th class="border-gray-500 border px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-300 text-sm font-light">
                    @foreach ($customers as $customer)
                        <tr class="border-b border-gray-500 hover:bg-gray-700">
                            <td class="border-gray-500 border px-4 py-2">{{ $customer->id }}</td>
                            <td class="border-gray-500 border px-4 py-2">{{ $customer->name }}</td>
                            <td class="border-gray-500 border px-4 py-2">{{ $customer->email }}</td>
                            <td class="border-gray-500 border px-4 py-2">{{ $customer->phone }}</td>
                            <td class="border-gray-500 border px-4 py-2">{{ $customer->address }}</td>
                            <td class="border-gray-500 border px-4 py-2">{{ $customer->tier }}</td>
                            <td class="border-gray-500 border px-4 py-2">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('customers.show', $customer->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
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
                <div class="p-4">
                    {{ $customers->links() }}
                    <div class="p-4">
                        <a href="{{ route('customers.create') }}" class="bg-teal-700 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded">Add customers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
