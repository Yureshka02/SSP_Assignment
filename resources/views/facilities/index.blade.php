{{--dark mode --}}
<x-app-layout class="bg-gray-900">
    <div class="bg-gray-800 py-6 text-center">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Facilities') }}
        </h2>
    </div>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-auto w-full text-gray-300">
                    <thead>
                    <tr>
                        <th class="px-4 py-2 border border-gray-600">ID</th>
                        <th class="px-4 py-2 border border-gray-600">Name</th>
                        <th class="px-4 py-2 border border-gray-600">Description</th>
                        <th class="px-4 py-2 border border-gray-600">Availability</th>
                        <th class="px-4 py-2 border border-gray-600">Updated At</th>
                        <th class="px-4 py-2 border border-gray-600">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($facilities as $facility)
                        <tr>
                            <td class="px-4 py-2 border border-gray-600">{{ $facility->id }}</td>
                            <td class="px-4 py-2 border border-gray-600">{{ $facility->name }}</td>
                            <td class="px-4 py-2 border border-gray-600">{{ $facility->description }}</td>
                            <td class="px-4 py-2 border border-gray-600">{{ $facility->availability }}</td>
                            <td class="px-4 py-2 border border-gray-600">{{ $facility->updated_at }}</td>
                            <td class="px-4 py-2 border border-gray-600">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('facilities.show', $facility->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                    <a href="{{ route('facilities.edit', $facility->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <form action="{{ route('facilities.destroy', $facility->id) }}" method="POST" class="inline">
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
                    {{ $facilities->links() }}
                </div>
                <div class="p-4">
                    <a href="{{ route('facilities.create') }}" class="bg-teal-700 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded">Add Facility</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
