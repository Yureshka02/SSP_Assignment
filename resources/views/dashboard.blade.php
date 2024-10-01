<x-app-layout>
    <!-- Page Header -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Content Box -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Tabs for Orders and Appointments -->
                <div x-data="ordersAppointmentsPage">
                    <!-- Tabs Navigation -->
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

                    <!-- Graphs Section -->
                    <div class="mt-8">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Dashboard Graphs</h2>

                        <!-- Orders Graph -->
                        <div id="ordersChart" class="mb-8 h-64 bg-white shadow-lg rounded-lg p-4"></div>

                        <!-- Appointments Graph -->
                        <div id="appointmentsChart" class="h-64 bg-white shadow-lg rounded-lg p-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('ordersAppointmentsPage', () => ({
                activeTab: 'orders',  // Default active tab
            }))
        })

        // Orders Chart
        const ordersChartCtx = document.getElementById('ordersChart').getContext('2d');
        new Chart(ordersChartCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($orders->pluck('first_name')) !!},
                datasets: [{
                    label: 'Orders',
                    data: {!! json_encode($orders->pluck('id')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Appointments Chart
        const appointmentsChartCtx = document.getElementById('appointmentsChart').getContext('2d');
        new Chart(appointmentsChartCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($appointments->pluck('first_name')) !!},
                datasets: [{
                    label: 'Appointments',
                    data: {!! json_encode($appointments->pluck('id')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-app-layout>
