
@extends('layouts.app')

@section('content')
    <!-- Tabs Navigation for Orders and Appointments -->
    <div x-data="ordersAppointmentsPage" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tabs -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <button type="button" x-on:click="activeTab = 'orders'"
                                    :class="{'border-indigo-500 text-indigo-600': activeTab === 'orders', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'orders'}"
                                    class="whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium focus:outline-none">
                                Orders
                            </button>
                            <button type="button" x-on:click="activeTab = 'appointments'"
                                    :class="{'border-indigo-500 text-indigo-600': activeTab === 'appointments', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'appointments'}"
                                    class="whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium focus:outline-none">
                                Appointments
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="mt-4">
                    <!-- Orders Section -->
                    <section x-show="activeTab === 'orders'">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Orders</h2>
                        @if($orders->isEmpty())
                            <p class="text-gray-600">No orders found.</p>
                        @else
                            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">ID</th>
                                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">Customer Name</th>
                                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">Email</th>
                                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $order->id }}</td>
                                        <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $order->first_name }}</td>
                                        <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $order->email }}</td>
                                        <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $order->status }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </section>

                    <!-- Appointments Section -->
                    <section x-show="activeTab === 'appointments'">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Appointments</h2>
                        @if($appointments->isEmpty())
                            <p class="text-gray-600">No appointments found.</p>
                        @else
                            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">ID</th>
                                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">Customer Name</th>
                                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">Email</th>
                                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $appointment)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $appointment->id }}</td>
                                        <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $appointment->first_name }}</td>
                                        <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $appointment->email }}</td>
                                        <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $appointment->status }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('ordersAppointmentsPage', () => ({
                activeTab: 'orders',  // Default active tab
            }))
        })
    </script>
@endsection

