<x-app-layout>
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <table class="min-w-full bg-gray-800">
                        <thead>
                        <tr class="w-full bg-gray-700 text-gray-300 uppercase text-sm leading-normal">
                            <th class="py-3 px-4 text-left">ID</th>
                            <th class="py-3 px-4 text-left">Customer Name</th>
                            <th class="py-3 px-4 text-left">Customer Phone</th>
                            <th class="py-3 px-4 text-left">Address</th>
                            <th class="py-3 px-4 text-left">Time</th>
                            <th class="py-3 px-4 text-left">Created At</th>
                            <th class="py-3 px-4 text-left">Updated At</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-300 text-sm font-light">
                        @foreach ($bookings as $booking)
                            <tr class="border-b border-gray-700 hover:bg-gray-700">
                                <td class="py-3 px-4 text-left">{{ $booking->id }}</td>
                                <td class="py-3 px-4 text-left">{{ $booking->customer_name }}</td>
                                <td class="py-3 px-4 text-left">{{ $booking->customer_phone }}</td>
                                <td class="py-3 px-4 text-left">{{ $booking->address }}</td>
                                <td class="py-3 px-4 text-left">{{ $booking->time }}</td>
                                <td class="py-3 px-4 text-left">{{ $booking->created_at }}</td>
                                <td class="py-3 px-4 text-left">{{ $booking->updated_at }}</td>
                                <td class="py-3 px-4 text-center">
                                    <div class="inline-flex space-x-2">
                                        <a href="{{ route('Bookings.show', $booking->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                        <a href="{{ route('Bookings.edit', $booking->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        <form action="{{ route('Bookings.destroy', $booking->id) }}" method="POST" class="inline">
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
                    <div class="p-4 mt-4 flex justify-between items-center">
                        <div>
                            {{ $bookings->links() }}
                        </div>
                        <div>
                            <a href="{{ route('Bookings.create') }}" class="bg-teal-700 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded">Add Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
