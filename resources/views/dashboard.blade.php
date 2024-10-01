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
                                        <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-600">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $appointment->id }}</td>
                                            <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $appointment->first_name }}</td>
                                            <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $appointment->email }}</td>
                                            <td class="py-3 px-4 border-b text-sm text-gray-700">{{ $appointment->status }}</td>
                                            <td class="py-3 px-4 border-b text-sm text-gray-700">
                                                <button type="button" class="bg-green-500 text-white px-2 py-1 rounded"
                                                        x-on:click="confirmAppointment('{{ $appointment->id }}', '{{ $appointment->email }}')">
                                                    Confirm
                                                </button>
                                                <button type="button" class="bg-red-500 text-white px-2 py-1 rounded ml-2"
                                                        x-on:click="rejectAppointment('{{ $appointment->id }}', '{{ $appointment->email }}')">
                                                    Reject
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <!-- Modal for confirmation -->
                                <div x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;">
                                    <div class="flex items-center justify-center min-h-screen">
                                        <div class="bg-white p-4 rounded shadow-lg max-w-md w-full">
                                            <h2 class="text-xl mb-4" x-text="modalMessage"></h2>
                                            <div class="flex justify-end">
                                                <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2"
                                                        x-on:click="closeModal()">Cancel</button>
                                                <button class="bg-blue-500 text-white px-4 py-2 rounded"
                                                        x-on:click="handleConfirm()">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </section>
                    </div>

                    <!-- Graphs Section -->
                    <div class="mt-8">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Dashboard Graphs</h2>

                        <!-- Orders Graph -->
                        <canvas id="ordersChart" class="mb-8 h-64 bg-white shadow-lg rounded-lg p-4"></canvas>

                        <!-- Appointments Graph -->
                        <canvas id="appointmentsChart" class="h-64 bg-white shadow-lg rounded-lg p-4"></canvas>
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
                showModal: false,
                modalMessage: '',
                appointmentId: null,
                appointmentEmail: null,
                action: null,  // To track if it's confirm or reject

                // Function to open the confirm modal for confirmation
                confirmAppointment(id, email) {
                    this.showModal = true;
                    this.modalMessage = 'Are you sure you want to confirm this appointment?';
                    this.appointmentId = id;
                    this.appointmentEmail = email;
                    this.action = 'confirm';
                },

                // Function to open the reject modal for rejection
                rejectAppointment(id, email) {
                    this.showModal = true;
                    this.modalMessage = 'Are you sure you want to reject this appointment?';
                    this.appointmentId = id;
                    this.appointmentEmail = email;
                    this.action = 'reject';
                },

                // Function to close the modal
                closeModal() {
                    this.showModal = false;
                    this.appointmentId = null;
                    this.appointmentEmail = null;
                    this.action = null;
                },

                // Function to handle confirmation and send email
                handleConfirm() {
                    // Close the modal
                    this.showModal = false;

                    // Make an API call to send the confirmation/rejection email
                    axios.post('/appointments/notify', {
                        appointment_id: this.appointmentId,
                        email: this.appointmentEmail,
                        action: this.action
                    }).then(response => {
                        // Optionally, show success notification
                        alert('Email sent successfully.');
                        location.reload(); // Refresh the page to see changes
                    }).catch(error => {
                        console.error('Error sending email:', error);
                        alert('Error sending email. Please try again.');
                    });
                }
            }));
        });

        // Chart.js logic for orders and appointments
        const ordersCountByMonth = {!! json_encode($orders->groupBy(fn($date) => \Carbon\Carbon::parse($date->created_at)->format('Y-m'))->map->count()) !!};
        const ordersMonths = Object.keys(ordersCountByMonth);
        const ordersCounts = Object.values(ordersCountByMonth);

        // Group appointments by month and count them
        const appointmentsCountByMonth = {!! json_encode($appointments->groupBy(fn($date) => \Carbon\Carbon::parse($date->created_at)->format('Y-m'))->map->count()) !!};
        const appointmentsMonths = Object.keys(appointmentsCountByMonth);
        const appointmentsCounts = Object.values(appointmentsCountByMonth);

        // Orders Chart
        const ordersChartCtx = document.getElementById('ordersChart').getContext('2d');
        new Chart(ordersChartCtx, {
            type: 'bar',
            data: {
                labels: ordersMonths,  // Months for x-axis
                datasets: [{
                    label: 'Orders Count',
                    data: ordersCounts,  // Number of orders for y-axis
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month',
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Orders',
                        }
                    }
                }
            }
        });

        // Appointments Chart
        const appointmentsChartCtx = document.getElementById('appointmentsChart').getContext('2d');
        new Chart(appointmentsChartCtx, {
            type: 'line',
            data: {
                labels: appointmentsMonths,  // Months for x-axis
                datasets: [{
                    label: 'Appointments Count',
                    data: appointmentsCounts,  // Number of appointments for y-axis
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {

                        title: {
                            display: true,
                            text: 'Month',
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Appointments',
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
